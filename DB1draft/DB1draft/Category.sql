CREATE TABLE Category(
	bookID INT NOT NULL ,
	Category VARCHAR(30),
	CHECK (LEN(bookID) = 6),
	PRIMARY KEY (bookID),
);

INSERT INTO Category (bookID,Category);
VALUES ('b10005','สืบสวน,ดราม่า');