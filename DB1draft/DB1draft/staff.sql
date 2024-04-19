CREATE TABLE staff(
	userID INT NOT NULL,
	CHECK (LEN(userID) = 4),
	PRIMARY KEY (userID)
);

INSERT INTO staff(userID)
VALUES ('1001');