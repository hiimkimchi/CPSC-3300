CREATE DATABASE QUARTERPROJECT;

USE QUARTERPROJECT;

CREATE TABLE USERS(
	UserID VARCHAR(10) NOT NULL,
	UserName VARCHAR(20) NOT NULL,
	UserEmail VARCHAR(320) NOT NULL,
	UserFirstName VARCHAR(20) NOT NULL,
	UserLastName VARCHAR(20) NOT NULL,
	PRIMARY KEY(UserID)
);

CREATE TABLE VENUE(
	VenueID VARCHAR(10) NOT NULL,
	VenueAddress VARCHAR(100) NOT NULL,
	VenueZipCode INT NOT NULL,
	VenuePhoneNumber VARCHAR(11) NOT NULL,
	VenueOwnerFirstName VARCHAR(20) NOT NULL,
	VenueOwnerLastName VARCHAR(20) NOT NULL,
	PRIMARY KEY(VenueID)
);

CREATE TABLE MEDIA(
	MediaID VARCHAR(10) NOT NULL,
	MediaType VARCHAR(20) NOT NULL,
	MediaLength TIMESTAMP NOT NULL,
	MediaOriginDate DATE NOT NULL,
	PRIMARY KEY(MediaID)
);

CREATE TABLE PERFORMER(
	PerformerID VARCHAR(10) NOT NULL,
	PerformerName VARCHAR(20) NOT NULL,
	PerformerGenre VARCHAR(20) NOT NULL,
	PerformerSetlist VARCHAR(500),
	PerformerType VARCHAR(1) NOT NULL,
	PerformerStartTime DATETIME NOT NULL,
	PRIMARY KEY(PerformerID)
);

CREATE TABLE HEADLINER(
	PerformerID VARCHAR(10) NOT NULL,
	HeadlinerLightShow VARCHAR(500) NOT NULL,
	HeadlinerVisuals VARCHAR(500) NOT NULL,
	FOREIGN KEY(PerformerID) REFERENCES PERFORMER(PerformerID) ON UPDATE CASCADE,
	PRIMARY KEY(PerformerID)
);

CREATE TABLE SUPPORTER(
	PerformerID VARCHAR(10) NOT NULL,
	SupporterRequests VARCHAR(500) NOT NULL,
	FOREIGN KEY(PerformerID) REFERENCES PERFORMER(PerformerID) ON UPDATE CASCADE,
	PRIMARY KEY(PerformerID)
);

CREATE TABLE FESTIVAL(
	FestivalID VARCHAR(10) NOT NULL,
	VenueID VARCHAR(10) NOT NULL,
	PerformerID VARCHAR(10) NOT NULL,
	FestivalStart DATETIME NOT NULL,
	FestivalEnd DATETIME NOT NULL,
	FestivalDescription VARCHAR(500),
	FOREIGN KEY(VenueID) REFERENCES VENUE(VenueID) ON UPDATE CASCADE,
	FOREIGN KEY(PerformerID) REFERENCES PERFORMER(PerformerID) ON UPDATE CASCADE,
	PRIMARY KEY(FestivalID, VenueID)
);

CREATE TABLE CONCERT (
	ConcertID VARCHAR(10) NOT NULL,
	VenueID VARCHAR(10) NOT NULL,
	MediaID VARCHAR(10) NOT NULL,
	PerformerID VARCHAR(10) NOT NULL,
	FestivalID VARCHAR(10) NOT NULL,
	ConcertType VARCHAR(20) NOT NULL,
	ConcertGenre VARCHAR(20) NOT NULL,
	ConcertStartTime DATETIME NOT NULL,
	FOREIGN KEY(VenueID) REFERENCES VENUE(VenueID) ON UPDATE CASCADE,
	FOREIGN KEY(MediaID) REFERENCES MEDIA(MediaID) ON UPDATE CASCADE,
	FOREIGN KEY(PerformerID) REFERENCES PERFORMER(PerformerID) ON UPDATE CASCADE,
	FOREIGN KEY(FestivalID) REFERENCES FESTIVAL(FestivalID) ON UPDATE CASCADE,
	PRIMARY KEY(ConcertID, VenueID)
);

CREATE TABLE REVIEW(
	ReviewID VARCHAR(10) NOT NULL,
	UserID VARCHAR(10) NOT NULL,
	ConcertID VARCHAR(10) NOT NULL,
	ReviewParagraph VARCHAR(5000),
	ReviewScore INT NOT NULL,
	FOREIGN KEY(UserID) REFERENCES USERS(UserID) ON UPDATE CASCADE,
	FOREIGN KEY(ConcertID) REFERENCES CONCERT(ConcertID) ON UPDATE CASCADE,
	PRIMARY KEY(ReviewID, UserID, ConcertID)
);


INSERT INTO USERS(UserID, UserName, UserEmail, UserFirstName, UserLastName) VALUES
	('0870542682', 'badevera04', 'bdevera@seattleu.edu', 'Benjamin', 'de Vera'),
    ('0647611212', 'jomi.kale', 'jruiz@seattleu.edu', 'Jomi', 'Ruiz'),
    ('4251517163', 'bryankimchi', 'bkim@seattleu.edu', 'Bryan', 'Kim'),
    ('7986050844', 'rykei.luo', 'rluo@seattleu.edu', 'Ryan', 'Luo'),
    ('6268250151', 'ethan.barroga', 'ebarroga@seattleu.edu', 'Ethan', 'Barroga'),
    ('2064701516', 'skyetensai', 'swong@seattleu.edu', 'Skyelar', 'Wong'),
    ('7517385182', 'darylnserquinia', 'dserquinia@seattleu.edu', 'Daryl', 'Serquinia'),
    ('7608001500', 'spaghemiily', 'etrinh@seattleu.edu', 'Emily', 'Trinh'),
    ('8517090341', 'brnt_pj', 'vnguyenpham@seattleu.edu', 'Vinh', 'Nguyenpham'),
    ('0209657080', 'ari_tumba', 'atumbagahan@uw.edu', 'Ari', 'Tumbagahan');

DROP DATABASE QUARTERPROJECT;
