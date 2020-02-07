DROP TABLE IF EXISTS Store CASCADE;
CREATE TABLE Store (
    storeID int(2) NOT NULL,
    telephone char(11) NOT NULL,
	streetAddress varchar(255) NOT NULL,
    city varchar(15) NOT NULL,
    state char(2) NOT NULL,
    zip int(5) NOT NULL,
	Primary Key (storeID)
);

DROP TABLE IF EXISTS Product CASCADE;
CREATE TABLE Product(
	upc int NOT NULL,
    productName varChar(255) NOT NULL,
	productBrand varChar(255) NOT NULL,
	productSize varchar(2) NOT NULL,
	productGender char(1) NOT NULL,
	productColor varChar(255) NOT NULL,
	productPrice decimal(9,2) DEFAULT 0.00,
	productIsActive boolean NOT NULL,
    Primary Key (upc)
);
DROP TABLE IF EXISTS Discount CASCADE;
CREATE TABLE Discount (
	storeID int(2) NOT NULL,
    upc int NOT NULL,
    discountIsActive boolean Not NULL,
    discountPrice int NULL,
    Primary Key (storeID, upc),
    Foreign Key (storeID) REFERENCES Store,
    Foreign Key (upc) REFERENCES Product
);

DROP TABLE IF EXISTS isAvailable CASCADE;
CREATE TABLE isAvailable (
	storeID int(2) NOT NULL,
    upc int NOT NULL,
    quantitiy int(3) DEFAULT 0,
    Primary Key (storeID, upc),
    Foreign Key (storeID) REFERENCES Store,
    Foreign Key (upc) REFERENCES Prodcut
);

DROP TABLE IF EXISTS Employee CASCADE;
CREATE TABLE Employee (
	empID int(10) NOT NULL,
    hashPassword varChar(255) NOT NULL,
    firstName varChar(15) NOT NULL,
    lastName varChar(15) NOT NULL,
    phoneNumber int(10) NOT NULL,
    isActive boolean NOT NULL,
    isAdmin boolean NOT NULL,
    Primary Key (empID)
);

