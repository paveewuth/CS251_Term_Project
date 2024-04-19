CREATE TABLE book_access(
	bookID INT NOT NULL ,
    userID INT NOT NULL ,
	CHECK (LEN(bookID) = 6),
    CHECK (LEN(userID) = 4),
	PRIMARY KEY (bookID),
    PRIMARY KEY (userID),
);

INSERT INTO book_access (bookID,userID);
VALUES ('b10005','1001');