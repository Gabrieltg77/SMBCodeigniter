create database teste;

CREATE TABLE `user` (`id` int NOT NULL AUTO_INCREMENT, 
`name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`phoneNumber` varchar(255) NOT NULL,
`birthDate` datetime NOT NULL,
PRIMARY KEY (`id`)) ENGINE=InnoDB`);