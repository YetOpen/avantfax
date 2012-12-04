-- Database update for 3.1.1

-- Barcode Route
CREATE TABLE IF NOT EXISTS BarcodeRoute (
barcode_id      INT auto_increment KEY,
barcode         TEXT,
alias           VARCHAR(40),
contact         VARCHAR(100),
printer		VARCHAR(100),
faxcatid        INT
) DEFAULT CHARACTER SET utf8;


ALTER TABLE DIDRoute ADD faxcatid INT;
ALTER TABLE Modems   ADD faxcatid INT;
ALTER TABLE AddressBookFAX ADD printer VARCHAR(100);

ALTER TABLE UserAccount ADD any_modem BOOL DEFAULT FALSE;

