DROP DATABASE IF EXISTS my_db;
CREATE DATABASE my_db;

USE my_db;

CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  username varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE posts (
  id int NOT NULL AUTO_INCREMENT,
  user_id int unsigned NOT NULL,
  content text NOT NULL,
  image_url varchar(255) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE likes (
  id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  post_id int NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY user_id (user_id),
  KEY post_id (post_id),
  CONSTRAINT likes_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id),
  CONSTRAINT likes_ibfk_2 FOREIGN KEY (post_id) REFERENCES posts (id)
);