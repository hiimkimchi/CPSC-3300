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
	VenueName VARCHAR(25) NOT NULL,
	VenueAddress VARCHAR(100) NOT NULL,
	VenueZipCode INT NOT NULL,
	VenuePhoneNumber VARCHAR(11) NOT NULL,
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

INSERT INTO VENUE(VenueID, VenueName, VenueAddress, VenueZipCode, VenuePhoneNumber) VALUES
	('36F5AF3C23','SHOWBOXDT','1426 1st Ave.', 98101,'2066283151'),
	('49E92EBB8C','SHOWBOXSD','1700 1st Ave. South', 98134, '2066520997'),
	('D12BB173D7','WAMU','800 Occidental Ave. South', 98134, '2063817848'),
	('E8504FD46A','LUMEN','800 Occidental Ave. South', 98134, '2063817555'),
	('B096FD5939','CLIPLEDGE','1st Ave. North', 98109, '2067527200'),
	('AB47B0163A','HANGAR30','6310 NE 74th St', 98115,'2062337892'),
	('24E08B5EDE','TRINITY','107 Occidental Ave South', 98104, '2066977702'),
	('D5D058F48B','THEGORGE','754 Silica Rd NW', 98848,'2066073440'),
	('27D5119FC5','NUEMOS','925 E Pike St', 98122,'2067099467'),
	('A22B110184','BARBOZA','925 E Pike St', 98122, '2067099442');

INSERT INTO MEDIA (MediaID, MediaType, MediaLength, MediaOriginDate) VALUES
	('M000000001', 'Audio', '01:33:06', '2023-05-01'),
	('M000000002', 'Audio', '01:27:17', '2023-05-10'),
	('M000000003', 'Audio', '00:39:48', '2023-05-27'),
	('M000000004', 'Audio', '02:03:35', '2023-07-05'),
	('M000000005', 'Audio', '02:21:36', '2023-09-11'),
	('M000000006', 'Video', '02:48:17', '2023-02-06'),
	('M000000007', 'Video', '01:48:54', '2024-02-24'),
	('M000000008', 'Video', '01:21:19', '2023-08-24'),
	('M000000009', 'Video', '02:29:00', '2023-04-17'),
	('M000000010', 'Video', '01:11:01', '2023-08-12');

INSERT INTO PERFORMER(PerformerID, PerformerName, PerformerGenre, PerformerSetlist, PerformerType, PerformerStartTime) VALUES
	('A1B2C3D4E5', 'ILLENIUM', 'EDM', 'Trilogy', 'H'),
	('A2B3C4D5E6', 'SLANDER', 'EDM', 'Thrive', 'S'),
	('B2A1D4C3E5', 'LE SSERAFIM', 'KPOP', 'Unforgiven', 'H'),
	('E5A1C3B2D4', 'NEW JEANS', 'KPOP', 'Get Up', 'H'),
	('D4516A2892', 'Zedd', 'EDM', 'Clarity', 'H'),
	('A9250BC253', 'Porter Robinson', 'EDM', 'Shelter', 'S'),
	('B72039KMA2', 'Marshmello', 'EDM', 'Alone', 'H'),
	('XX2314LM9C', 'Excision', 'EDM', 'Thunderdome', 'H'),
	('G5029123KL', 'Gryffin', 'EDM', 'All You Need To Know', 'S'),
	('DBN2392837', 'Dabin', 'EDM', 'Worlds Away', 'H'),
	('BRNMRS1123', 'Bruno Mars', 'Pop', 'Doo Wops and Hooligans', 'H'),
	('KSHI192023', 'Keshi', 'Pop', 'Skeletons', 'H'),
	('DRKE555222', 'Drake', 'Rap', 'For All The Dogs', 'H'),
	('JJI2523212', 'Joji', 'Pop', 'Sanctuary', 'S'),
	('PSTMLNE220', 'Post Malone', 'Pop', 'Hollywoods Bleeding', 'S'),
	('NIKI516506', 'NIKI', 'Pop', 'Nicole', 'S'),
	('RCHBRN4923', 'Rich Brian', 'Pop', 'The Sailor', 'S'),
	('WRRNHUE999', 'Warren Hue', 'Pop', 'Boy of the Year', 'S'),
	('ISXO444002', 'ISOXO', 'EDM', 'niteharts', 'S'),
	('KNCK202017', 'Knock2', 'EDM', 'ROOM 202', 'S');

INSERT INTO HEADLINER(PerformerID, HeadlinerLightShow, HeadlinerVisuals) VALUES
	('A1B2C3D4E5', 'Fireworks + Lasers', 'Hanzo from Overwatch'),
	('XX2314LM9C', 'Lasers + Visual Show', 'Goku'),
	('B72039KMA2', 'Lasers + Visual Show', 'Dancing Marshmello Logo'),
	('B2A1D4C3E5', 'Fireworks + Visual Show', 'Unforgiven Album Cover'),
	('DBN2392837', 'Lasers + Visual Show + Fireworks', 'Fantasy Landscape'),
	('BRNMRS1123', 'Headlights', 'Live Concert Performance'),
	('E5A1C3B2D4', 'Fireworks + Visual Show', 'Dancing NWJNS logo'),
	('D4516A2892', 'Lasers + Visual Show + Fireworks', 'Squid Game Visuals'),
	('KSHI192023', 'Front Camera Angle + Lasers', 'Front Camera Angle in different filters'),
	('DRKE555222', 'Pyrotechnics', 'Album Cover');
		
INSERT INTO SUPPORTER(PerformerID, SupporterRequests) VALUES
	('G5029123KL', 'CDJ-3000'),
	('A9250BC253', 'CDJ-3000'),
	('A2B3C4D5E6', 'CDJ-3000 + WATER'),
	('JJI2523212', 'Uber Eats Driver'),
	('PSTMLNE220', 'Food and Snacks'),
	('NIKI516506', 'Guitar + Live Band'),
	('RCHBRN4923', 'Bring Warren Hue on Stage'),
	('WRRNHUE999', 'Perform with Rich Brian'),
	('ISXO444002', 'CDJ-3000 + B2B W KNOCK2'),
	('KNCK202017', 'CDJ-3000 + B2B W ISOXO');

INSERT INTO FESTIVAL(FestivalID, VenueID, PerformerID, FestivalStart, FestivalEnd, FestivalDescription) VALUES
	('TMMRLAND01', 'E8504FD46A', 'KNCK202017', '2023-11-24 01:00:00', '2023-11-26 01:00:00', 'EDM FESTIVAL'),
	('TMMRLAND01', 'E8504FD46A', 'ISXO444002', '2023-11-24 01:00:00', '2023-11-26 01:00:00', 'EDM FESTIVAL'),
	('TMMRLAND01', 'E8504FD46A', 'B72039KMA2', '2023-11-24 01:00:00', '2023-11-26 01:00:00', 'EDM FESTIVAL'),
	('TMMRLAND01', 'E8504FD46A', 'A1B2C3D4E5', '2023-11-24 01:00:00', '2023-11-26 01:00:00', 'EDM FESTIVAL'),
	('TMMRLAND01', 'E8504FD46A', 'D4516A2892', '2023-11-24 01:00:00', '2023-11-26 01:00:00', 'EDM FESTIVAL'),
	('BOOSEA0294', 'D12BB173D7', 'XX2314LM9C', '2023-10-28 12:00:00', '2023-11-01 01:00:00', 'EDM HALLOWEEN FESTIVAL'),
	('BOOSEA0294', 'D12BB173D7', 'DBN2392837', '2023-10-28 12:00:00', '2023-11-01 01:00:00', 'EDM HALLOWEEN FESTIVAL'),
	('BOOSEA0294', 'D12BB173D7', 'A9250BC253', '2023-10-28 12:00:00', '2023-11-01 01:00:00', 'EDM HALLOWEEN FESTIVAL'),
	('BOOSEA0294', 'D12BB173D7', 'A2B3C4D5E6', '2023-10-28 12:00:00', '2023-11-01 01:00:00', 'EDM HALLOWEEN FESTIVAL'),
	('BOOSEA0294', 'D12BB173D7', 'JJI2523212', '2023-10-28 12:00:00', '2023-11-01 01:00:00', 'EDM HALLOWEEN FESTIVAL');

INSERT INTO CONCERT(ConcertID, VenueID, MediaID, PerformerID, FestivalID, ConcertType, ConcertGenre, ConcertStartTime) VALUES
	('D08F897678','36F5AF3C23','M000000002','E5A1C3B2D4', NULL,'Choreographed','Kpop','2024-08-17 20:00:00'),
	('B16892A3C6','E8504FD46A','M000000001','A1B2C3D4E5', 'TMMRLAND01','Rave','EDM','2024-11-24 03:00:00'),
	('D4DB214AD3','E8504FD46A','M000000001','DBN2392837', 'TMMRLAND01','Rave','EDM','2024-11-25 04:00:00'),
	('229C0846DB','E8504FD46A','M000000004','KNCK202017', 'TMMRLAND01','Rave','EDM','2024-11-26 00:30:00'),
	('AED412125F','D12BB173D7','M000000009','ISXO444002', 'BOOSEA0294','Rave','EDM','2024-10-28 12:30:00'),
	('B45B08F2F7','D12BB173D7','M000000005','B72039KMA2', 'BOOSEA0294','Rave','EDM','2024-10-29 18:00:00'),
	('E1C897D10E','D12BB173D7','M000000009','A9250BC253', 'BOOSEA0294','Rave','EDM','2024-10-30 04:00:00'),
	('4F588A2B0F','D5D058F48B','M000000003','A1B2C3D4E5', NULL,'Rave','EDM','2024-05-28 14:00:00'),
	('71D5D43B33','B096FD5939','M000000010','JJI2523212', NULL,'Live Band','Pop','2024-10-15 03:00:00'),
	('4FA4A4491E','49E92EBB8C','M000000006','KSHI192023', NULL,'Solo','RnB','2024-04-11 07:00:00');

INSERT INTO REVIEW(ReviewID, UserID, ConcertID, ReviewParagraph, ReviewScore) VALUES
	('R000000001', '0870542682', 'D08F897678', 'jib', 2),
	('R000000002', '7517385182', 'B16892A3C6', 'jibber', 5),
	('R000000003', '8517090341', 'D4DB214AD3', 'jabber', 6),
	('R000000004', '0209657080', '4FA4A4491E', 'jibber jabber', 10),
	('R000000005', '4251517163', 'E1C897D10E', 'but id rather', 8),
	('R000000006', '7986050844', 'D08F897678', 'get pasty', 7),
	('R000000007', '0870542682', 'B45B08F2F7', 'like marshall mathers', 6),
	('R000000008', '7517385182', 'B16892A3C6', 'Uno Reverse', 1),
	('R000000009', '6268250151', 'B45B08F2F7', 'Im the Kid', 3),
	('R000000010', '0870542682', '229C0846DB', 'But youre a pastor', 6);

-- Find All reviews for a specific concert
SELECT R.ReviewID, R.ReviewParagraph, R.ReviewScore, U.UserName, U.UserEmail
FROM REVIEW R
INNER JOIN USERS U ON R.UserID = U.UserID
WHERE R.ConcertID = 'C1';

-- Find concerts with no reviews
SELECT C.ConcertID, C.ConcertType, C.ConcertGenre
FROM CONCERT C
LEFT JOIN REVIEW R ON C.ConcertID = R.ConcertID
WHERE R.ReviewID IS NULL;

-- Calculate total concerts for each venue
SELECT V.VenueID, V.VenueAddress, COUNT(C.ConcertID) AS TotalConcerts
FROM VENUE V
JOIN CONCERT C ON V.VenueID = C.VenueID
GROUP BY V.VenueID, V.VenueAddress;

-- Find average score for one concert
SELECT AVG(REVIEW.ReviewScore)
FROM CONCERT 
LEFT JOIN REVIEW ON CONCERT.ConcertID = REVIEW.ConcertID
WHERE REVIEW.ReviewScore IS NOT NULL AND REVIEW.ConcertID = 'B16892A3C6';

-- Delete a review from the REVIEW table
DELETE FROM REVIEW WHERE ReviewID = 'R000000006';

DROP DATABASE QUARTERPROJECT;
