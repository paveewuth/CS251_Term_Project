CREATE TABLE Author(
	bookID INT NOT NULL ,
	Author VARCHAR(50),
	CHECK (LEN(bookID) = 6),
	PRIMARY KEY (bookID),
);

INSERT INTO Author (bookID,Author);
VALUES ('b10005','Gosho Aoyama');