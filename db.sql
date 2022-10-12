--CREATE DATABASE eaxo IF NOT EXISTS;


CREATE TABLE IF NOT EXISTS users(
    id serial,
    email varchar(100) NOT NULL UNIQUE,
    username varchar(100) NOT NULL UNIQUE,
    passwd varchar(255) NOT NULL,
    
);

CREATE TABLE IF NOT EXISTS exercices(
    id serial,
    userID serial,
    name varchar(100),
    FOREIGN KEY (userID)
        REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS widgets_exercices_list(
    id serial,
    exerciceID serial,
    widgetID serial,
    name varchar(100),
);

CREATE TABLE IF NOT EXISTS widgets(
    id serial
);

CREATE TABLE IF NOT EXISTS widgets_elements(
    id serial,
    widgetId serial,
    wType varchar(100),
    class varchar(255),
    content text,
    css: text,
    FOREIGN KEY (widgetId)
        REFERENCES widgets(id)
);

CREATE TABLE IF NOT EXISTS gallery_folders(
    id serial,
    folderParent serial,
    pName varchar(255),
    ownerId serial,
    FOREIGN KEY folderParent
        REFERENCES gallery_folders(id)
);

CREATE TABLE IF NOT EXISTS gallery_images(
    id serial,
    folderParent serial,
    pName varchar(255),
    FOREIGN KEY 
);

CREATE TABLE IF NOT EXISTS groups(
    id serial,
    gNAme varchar(255),
);

CREATE TABLE IF NOT EXISTS permissions(
    id serial,
    pName varchar(255),
);