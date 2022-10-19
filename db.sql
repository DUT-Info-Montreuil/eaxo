

DROP TABLE IF EXISTS exercices;

DROP TABLE IF EXISTS widgets_exercices_list;
DROP TABLE IF EXISTS widgets_elements;
DROP TABLE IF EXISTS widgets_elements;
DROP TABLE IF EXISTS gallery_folders;
DROP TABLE IF EXISTS gallery_images;
DROP TABLE IF EXISTS groups;
DROP TABLE IF EXISTS permissions;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS widgets;

CREATE TABLE IF NOT EXISTS groups(
    id serial,
    gname varchar(255)
);

INSERT INTO groups (gname) VALUES ("user");


CREATE TABLE IF NOT EXISTS users(
    id serial,
    email varchar(100) NOT NULL UNIQUE,
    username varchar(100) NOT NULL UNIQUE,
    groupid bigint(20) DEFAULT 1,
    passwd varchar(255) NOT NULL
    
);

CREATE TABLE IF NOT EXISTS exercices(
    id serial,
    userID bigint(20) UNSIGNED,
    name varchar(100),
    FOREIGN KEY (userID)
        REFERENCES users(id)
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS widgets_exercices_list(
    id serial,
    exerciceID bigint(20) UNSIGNED,
    widgetID bigint(20) UNSIGNED,
    name varchar(100)
);

CREATE TABLE IF NOT EXISTS widgets(
    id serial
);

CREATE TABLE IF NOT EXISTS widgets_elements(
    id serial,
    widgetId bigint(20) UNSIGNED,
    wType varchar(100),
    class varchar(255),
    content text,
    css text,
    FOREIGN KEY (widgetId)
        REFERENCES widgets(id)
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS gallery_folders(
    id serial,
    folderParent bigint(20) UNSIGNED,
    pName varchar(255),
    ownerId bigint(20) UNSIGNED,
    FOREIGN KEY (ownerId)
        REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (folderParent)
        REFERENCES gallery_folders(id)
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS gallery_images(
    id serial,
    folderParent bigint(20) UNSIGNED,
    pName varchar(255),
    FOREIGN KEY (folderParent) 
    	REFERENCES gallery_images(id) 
    	ON DELETE CASCADE
    
);



CREATE TABLE IF NOT EXISTS permissions(
    id serial,
    pname varchar(255)
);



INSERT INTO users (email, username, passwd) VALUES("prof@gmail.com", "prof", " $2y$10$S0EONdKejoe6jxprdZr7B.KjKO4FGGNmB.ih/v5R98bVo6fabSrRqok");