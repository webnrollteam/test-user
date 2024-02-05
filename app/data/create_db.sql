CREATE DATABASE `user`;

CREATE TABLE `user`.`user` (
	id INT auto_increment NOT NULL,
	name varchar(255) NOT NULL,
	email varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	CONSTRAINT user_PK PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user`.`user`
(id, name, email, password)
VALUES(1, 'Алексей', 'info@web-n-roll.ru', '827ccb0eea8a706c4c34a16891f84e7b');
