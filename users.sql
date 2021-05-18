CREATE TABLE users (
    id INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    pasword VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    phone_number VARCHAR(100) NOT NULL,
    userLV VARCHAR(1) NOT NULL,
    regdate timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users`(`id`, `username`, `pasword`, `name`, `email`, `address`, `phone_number`, `userLV`, `regdate`) VALUES (1,'admin','4040','-','-','-','-','a','-')