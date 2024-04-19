CREATE TABLE Employee (
    userID INT AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    birthday DATE NOT NULL,
    phoneNumber VARCHAR(10) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    houseNumber VARCHAR(8) NOT NULL,
    street VARCHAR(20) NOT NULL,
    district VARCHAR(20) NOT NULL,
    subdistrict VARCHAR(20) NOT NULL,
    province VARCHAR(20) NOT NULL,
    zipcode VARCHAR(5) NOT NULL,
    PRIMARY KEY (userID),
    CHECK (CHAR_LENGTH(phoneNumber) = 10),
    CHECK (CHAR_LENGTH(zipcode) = 5)
);
INSERT INTO Employee (userID, firstName, lastName, gender, birthday, phoneNumber, salary, email, password, houseNumber, street, district, subdistrict, province, zipcode)
VALUES ('1001', 'คริสต์', 'อั้ม', 'M', '1999-04-30', '0923308811', '12000', 'krit.aum@dome.tu.ac.th', 'krit1234', '63/62', 'สุขุมวิท', 'บางนา', 'บางนา', 'กรุงเทพ', '10260');

UPDATE Employee
SET phoneNumber = '0290331818'
WHERE userID = '1001';
