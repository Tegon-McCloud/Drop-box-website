USE FileStorage;
INSERT INTO accounts VALUES (666, "hack account", "666");
INSERT INTO files VALUES (DEFAULT, 666, "hacker.txt");
INSERT INTO files VALUES (DEFAULT, 666, "C:HEJHEJ MED DIGawd");

/*
CREATE TABLE accounts(
	id int UNIQUE NOT NULL AUTO_INCREMENT,
	username varchar(255) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE files(
	id int UNIQUE NOT NULL AUTO_INCREMENT,
    account_id int NOT NULL,
    file_path varchar(255) UNIQUE NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(account_id) REFERENCES accounts(id)
);
*/