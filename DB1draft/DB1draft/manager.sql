CREATE TABLE manager(
	userID INT NOT NULL,
	education VARCHAR(20) NOT NULL,
	CHECK (LEN(userID) = 4),
	PRIMARY KEY (userID)
);

INSERT INTO manager (userID, education)
VALUES ('1002', 'ปริญญาตรี');