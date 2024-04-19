CREATE TABLE member(
	customerID VARCHAR(6) NOT NULL,
	memStart DATE,
	memExp DATE,
	PRIMARY KEY (customerID)
);

INSERT INTO member(customerID, memStart, memExp)
VALUES ('c00050', '2024-03-28', '2024-04-28');