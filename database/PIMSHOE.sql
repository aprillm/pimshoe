DROP TABLE IF EXISTS Store CASCADE;
CREATE TABLE Store (
    storeID int(2) NOT NULL,
    storeName varchar(45) NOT NULL,
    telephone int(11) NOT NULL,
    streetAddress varchar(255) NOT NULL,
    city varchar(15) NOT NULL,
    state char(2) NOT NULL,
    zip int(5) NOT NULL,
    userID int(4) NOT NULL,
	Primary Key (storeID),
    Foreign Key (userID) REFERENCES User
);

DROP TABLE IF EXISTS Product CASCADE;
CREATE TABLE Product(
	upc int NOT NULL,
    productName varchar(255) NOT NULL,
	productBrand varchar(255) NOT NULL,
	productSize varchar(2) NOT NULL,
	productGender char(1) NOT NULL,
	productColor varchar(255) NOT NULL,
	productPrice decimal(3,2) NOT NULL DEFAULT 0.00,
	productIsActive tinyint NOT NULL DEFAULT 0,
    Primary Key (upc)
);
DROP TABLE IF EXISTS Discount CASCADE;
CREATE TABLE Discount (
	storeID int(2) NOT NULL,
    upc int NOT NULL,
    discountIsActive tinyint NOT NULL DEFAULT 0,
    discountPrice int NULL,
    Primary Key (storeID, upc),
    Foreign Key (storeID) REFERENCES Store,
    Foreign Key (upc) REFERENCES Product
);

DROP TABLE IF EXISTS isAvailable CASCADE;
CREATE TABLE isAvailable (
	storeID int(2) NOT NULL,
    upc int NOT NULL,
    qty int(3) NOT NULL DEFAULT 0 CHECK ( qty >= 0),
    Primary Key (storeID, upc),
    Foreign Key (storeID) REFERENCES Store,
    Foreign Key (upc) REFERENCES Product
);

DROP TABLE IF EXISTS User CASCADE;
CREATE TABLE User (
  userID INT(4) NOT NULL,
  email VARCHAR(255) NOT NULL,
  passhash VARCHAR(64) NOT NULL DEFAULT 'BA01338BA5FA0C1584A6D41F93FE550B1D715A8DE2DA10D6C673131A85658394',
  f_name VARCHAR(32) NOT NULL,
  l_name VARCHAR(32) NOT NULL,
  isActive TINYINT NOT NULL DEFAULT 0,
  isAdmin TINYINT NOT NULL DEFAULT 0,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  PRIMARY KEY (userID)
);

