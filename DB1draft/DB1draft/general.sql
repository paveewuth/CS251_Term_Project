CREATE TABLE general(
	customerID INT NOT NULL ,
    CHECK (LEN(customerID) = 6),
    PRIMARY KEY (customerID),
);

INSERT INTO general (customerID);
VALUES ('c00050');