#
# User registration table
#
CREATE TABLE users
(
    id INT(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    tel VARCHAR(20),
    nationality VARCHAR(40),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE UNIQUE INDEX users_email_unique ON users (email);

#
# User delete requests table 
#
CREATE TABLE user_delete_requests
(
    id INT(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    comment VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);