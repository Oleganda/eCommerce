CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT,
    email varchar(255) NOT NULL UNIQUE,
    phone varchar(255) NOT NULL,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    password varchar(500) NOT NULL,
    role BINARY,
    PRIMARY KEY (id)
)