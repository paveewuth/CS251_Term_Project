CREATE TABLE CartoonBook(
	bookID INT NOT NULL ,
	bookName VARCHAR(255),
	price INT,
	borrowCount INT,
	CHECK (LEN(bookID) = 6),
	PRIMARY KEY (bookID),
);

INSERT INTO CartoonBook (bookID,bookName,price,borrowCount);
VALUES ('b10005','ยอดนักสืบจิ๋วโคนัน เล่ม 1','110','15');