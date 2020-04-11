create database rewards;
use rewards;

GRANT ALL ON publications.* TO 'me'@'localhost'
	IDENTIFIED BY '1234';


CREATE TABLE users (
userId INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
userName varchar(100),
password varchar(100),
firstName varchar(100),
lastName varchar(100),
role varchar(100),
PRIMARY KEY (userId)    
)
Engine MyISAM;


CREATE TABLE redemption (
redeemId INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
date DATE,
accountID INT (11),
cardId INT (11),
pointsRedeemed INT (11),
PRIMARY KEY (redeemId)    
)
Engine MyISAM;


CREATE TABLE account (
	accountId INT (11) UNSIGNED NOT NULL AUTO_INCREMENT key,
    userId int(11),
    accountType varchar(100),
	points int(50)
)
Engine MyISAM;

INSERT INTO users( userName, password, firstName, lastName, role)
VALUES('kyle', 'password1', 'kyle', 'gashler', 'admin');
INSERT INTO users( userName, password, firstName, lastName, role)
VALUES('jason', 'password1', 'jason', 'isaacs', 'admin');

INSERT INTO account(userID, accountType, points)
VALUES('1', 'Rewards Member', 100);
INSERT INTO account(userID, accountType, points)
VALUES('2', 'Rewards Member', 200);
INSERT INTO account(userID, accountType, points)
VALUES('3', 'Rewards Member', 300);
INSERT INTO account(userID, accountType, points)
VALUES('4', 'Rewards Member', 400);
INSERT INTO account(userID, accountType, points)
VALUES('5', 'Rewards Member', 500);

CREATE TABLE giftcard (
	cardId INT (11) UNSIGNED NOT NULL AUTO_INCREMENT key,
    cardName varchar(100),
	cardType varchar(100),
    cardValue float (10),
    points int (50)
)
Engine MyISAM;

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Amazon', 'Giftcard', 25, 10);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Amazon', 'Giftcard', 50, 20);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Amazon', 'Giftcard', 75, 30);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Amazon', 'Giftcard', 100, 40);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'AirAsia', 'Sky Miles', 150, 50);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'AirAsia', 'Sky Miles', 200, 60);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'AirAsia', 'Sky Miles', 250, 70);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'AirAsia', 'Sky Miles', 300, 80);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'AirAsia', 'Sky Miles', 350, 90);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'AirAsia', 'Sky Miles', 400, 100);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Hilton', 'Giftcard', 25, 10);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Hilton', 'Giftcard', 50, 20);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Hilton', 'Giftcard', 75, 30);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Hilton', 'Giftcard', 100, 40);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Hilton', 'Giftcard', 125, 50);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Marriot', 'Giftcard', 25, 10);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Marriot', 'Giftcard', 50, 20);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Marriot', 'Giftcard', 75, 30);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Marriot', 'Giftcard', 100, 40);

INSERT INTO giftcard(cardName, cardType, cardValue, points)
VALUES( 'Marriot', 'Giftcard', 120, 50);
