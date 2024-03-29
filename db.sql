

DROP TABLE IF EXISTS exercices;
DROP TABLE IF EXISTS folders;
DROP TABLE IF EXISTS widgets_exercices_list;
DROP TABLE IF EXISTS exercice_elements;
DROP TABLE IF EXISTS gallery_images;
DROP TABLE IF EXISTS gallery_folders;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS permissions;

DROP TABLE IF EXISTS widgets;
DROP TABLE IF EXISTS reset_password;
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS `groups`(
    id serial,
    gname varchar(255),
    PRIMARY KEY(id)
);

INSERT INTO `groups` (gname) VALUES ('user');


CREATE TABLE IF NOT EXISTS users(
    id serial,
    email varchar(100) NOT NULL UNIQUE,
    username varchar(100) NOT NULL UNIQUE,
    groupid bigint(20) DEFAULT 1,
    passwd varchar(255) NOT NULL,
    PRIMARY KEY(id)
    
);

CREATE TABLE IF NOT EXISTS folders(
    id serial,
    folderParent bigint(20) UNSIGNED,
    title varchar(255),
    ownerId bigint(20) UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (ownerId)
        REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (folderParent)
        REFERENCES folders(id)
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS exercices(
    id serial,
    exoNumber int(10),
    userID bigint(20) UNSIGNED,
    name varchar(100),
    folderParent bigint(20) UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (userID)
        REFERENCES users(id)
        ON DELETE CASCADE,
    FOREIGN KEY (folderParent)
        REFERENCES folders(id)
        ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS widgets_exercices_list(
    id serial,
    exerciceID bigint(20) UNSIGNED,
    widgetID bigint(20) UNSIGNED,
    name varchar(100),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS widgets(
    id serial
);

CREATE TABLE IF NOT EXISTS exercice_elements(
    id serial,
    exerciceId bigint(20) UNSIGNED,
    parentId varchar(255),
    htmlID varchar(255) UNIQUE,
    wType varchar(100),
    dataset text,
    class varchar(255),
    content text,
    css text,
    PRIMARY KEY(id)/*,
    FOREIGN KEY (parentId)
        REFERENCES widgets(id)
        ON DELETE CASCADE*/
);

CREATE TABLE IF NOT EXISTS gallery_folders(
    id serial,
    folderParent bigint(20) UNSIGNED,
    pName varchar(255),
    ownerId bigint(20) UNSIGNED,
    PRIMARY KEY(id),
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
    Img64 LONGTEXT,
    ownerId bigint(20) UNSIGNED,
    FOREIGN KEY (folderParent) 
    	REFERENCES gallery_folders(id)
    	ON DELETE CASCADE,
    FOREIGN KEY (ownerId)
        REFERENCES users(id)
        ON DELETE CASCADE,
    PRIMARY KEY(id)
);



CREATE TABLE IF NOT EXISTS permissions(
    id serial,
    pname varchar(255),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS reset_password(
    id serial,
    userid bigint(20) UNSIGNED UNIQUE,
    link varchar(255),
    expire timestamp,
    FOREIGN KEY (userid)
        REFERENCES users(id)
);


INSERT INTO users (email, username, passwd) VALUES('prof@gmail.com', 'proftest', '$2y$10$CRsZddHPQ66oc8fE2l6VEOL4epL8P2XT7KIqacSR.ZfGA8TJ/WWea');
INSERT INTO users (email, username, groupid, passwd) VALUES('admin@gmail.com', 'admin', 2, '$2y$10$Oc.1DItD3XdFQpvkIjCjTeUkN4E9wN4ElOZzPDBrqT4T1sNfHkktu');

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
