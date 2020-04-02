DROP DATABASE IF EXISTS FileStorage;
CREATE DATABASE FileStorage;

USE FileStorage;

/*
Create tablesfile_path
*/
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

/*
Create procedures
*/
DELIMITER $$
/*
use a username to get id and password for that user
*/
CREATE PROCEDURE get_id_password(IN _username varchar(255))
BEGIN
	SELECT id, password FROM accounts WHERE username = _username LIMIT 1;
END$$

CREATE PROCEDURE create_account(IN _username varchar(255), IN _password varchar(255))
BEGIN
	INSERT INTO accounts(username, password) VALUES(_username, _password);
END$$

CREATE PROCEDURE delete_account(IN _account_id int)
BEGIN
	DELETE FROM files WHERE account_id = _account_id;
    DELETE FROM accounts WHERE id = _account_id;
END$$

CREATE PROCEDURE file_stored(IN _account_id int, IN _file_path varchar(255))
BEGIN
	INSERT INTO files(account_id, file_path) VALUES(_account_id, _file_path); 
END$$

CREATE PROCEDURE get_file_paths(IN _account_id int, IN _limit int)
BEGIN
	SELECT file_path FROM files WHERE account_id = _account_id;
END$$

DELIMITER ;