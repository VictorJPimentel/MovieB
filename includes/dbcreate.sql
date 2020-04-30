DROP DATABASE IF EXISTS `classic_theatre`;
CREATE DATABASE `classic_theatre`;
USE `classic_theatre`;

SET NAMES utf8;
SET character_set_client = utf8mb4 ;

CREATE TABLE `users` (
	`userId` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tickets` (
	`ticketId` INT NOT NULL AUTO_INCREMENT,
	`movieId` INT NOT NULL,
	`orderId` INT NOT NULL,
	`movieDate` DATE NOT NULL,
	`movieTime` TIME NOT NULL,
	`type` VARCHAR(255) NOT NULL,
	`price` BOOLEAN NOT NULL,
	PRIMARY KEY (`ticketId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `movies` (
	`movieId` INT NOT NULL AUTO_INCREMENT,
	`movieName` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`movieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `movies` VALUES (NULL,'Aladdin');
INSERT INTO `movies` VALUES (NULL,'Titanic');
INSERT INTO `movies` VALUES (NULL,'Avatar');
INSERT INTO `movies` VALUES (NULL,'Shawshank Redemption');
INSERT INTO `movies` VALUES (NULL,'The Godfather');

CREATE TABLE `reviews` (
	`reviewId` INT NOT NULL AUTO_INCREMENT,
	`movieId` INT NOT NULL,
	`userId` INT NOT NULL,
	`reviewText` TEXT NOT NULL,
	PRIMARY KEY (`reviewId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `orders` (
	`orderId` INT NOT NULL AUTO_INCREMENT,
	`userId` INT NOT NULL,
	PRIMARY KEY (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `menu` (
	`menuId` INT NOT NULL,
	`menuName` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`menuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `items` (
	`itemId` INT NOT NULL AUTO_INCREMENT,
	`orderId` INT NOT NULL,
	`itemName` INT NOT NULL,
	PRIMARY KEY (`itemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `messages` (
	`messageId` INT NOT NULL AUTO_INCREMENT,
	`userId` INT NOT NULL,
	`message` VARCHAR(255) NOT NULL,
	`resolved` BOOLEAN NOT NULL,
	PRIMARY KEY (`messageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `likes` (
	`likeId` INT NOT NULL AUTO_INCREMENT,
	`movieId` INT NOT NULL,
	`userId` INT NOT NULL,
	PRIMARY KEY (`likeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `dislikes` (
	`dislikeId` INT NOT NULL AUTO_INCREMENT,
	`movieId` INT NOT NULL,
	`userId` INT NOT NULL,
	PRIMARY KEY (`dislikeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `useful` (
	`usefulId` INT NOT NULL AUTO_INCREMENT,
	`reviewId` INT NOT NULL,
	`userId` INT NOT NULL,
	PRIMARY KEY (`usefulId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `tickets` ADD CONSTRAINT `tickets_fk0` FOREIGN KEY (`movieId`) REFERENCES `movies`(`movieId`);

ALTER TABLE `tickets` ADD CONSTRAINT `tickets_fk1` FOREIGN KEY (`orderId`) REFERENCES `orders`(`orderId`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`userId`) REFERENCES `users`(`userId`);

ALTER TABLE `items` ADD CONSTRAINT `items_fk0` FOREIGN KEY (`orderId`) REFERENCES `orders`(`orderId`);

ALTER TABLE `items` ADD CONSTRAINT `items_fk1` FOREIGN KEY (`itemName`) REFERENCES `menu`(`menuId`);

ALTER TABLE `messages` ADD CONSTRAINT `messages_fk0` FOREIGN KEY (`userId`) REFERENCES `users`(`userId`);

ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk0` FOREIGN KEY (`movieId`) REFERENCES `movies`(`movieId`);

ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk1` FOREIGN KEY (`userId`) REFERENCES `users`(`userId`);

ALTER TABLE `likes` ADD CONSTRAINT `likes_fk0` FOREIGN KEY (`movieId`) REFERENCES `movies`(`movieId`);

ALTER TABLE `likes` ADD CONSTRAINT `likes_fk1` FOREIGN KEY (`userId`) REFERENCES `users`(`userId`);

ALTER TABLE `dislikes` ADD CONSTRAINT `dislikes_fk0` FOREIGN KEY (`movieId`) REFERENCES `movies`(`movieId`);

ALTER TABLE `dislikes` ADD CONSTRAINT `dislikes_fk1` FOREIGN KEY (`userId`) REFERENCES `users`(`userId`);

ALTER TABLE `useful` ADD CONSTRAINT `useful_fk0` FOREIGN KEY (`reviewId`) REFERENCES `reviews`(`reviewId`);

ALTER TABLE `useful` ADD CONSTRAINT `useful_fk1` FOREIGN KEY (`userId`) REFERENCES `users`(`userId`);
