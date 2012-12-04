-- Database update for 3.0.0

ALTER TABLE UserAccount ADD is_admin       BOOL DEFAULT FALSE;

INSERT INTO UserAccount SET name='AvantFAX Admin', username='admin', password='5f4dcc3b5aa765d61d8327deb882cf99', wasreset=TRUE, email='root@mydomain.com', is_admin = TRUE, acc_enabled = TRUE, superuser = TRUE;

ALTER TABLE UserPasswords DROP adminpwd;

ALTER TABLE FaxArchive change faxnumid faxnumid INT;

DROP TABLE AdminAccount;

-- DROP TABLE UserRubrica;
-- DROP TABLE Rubrica;
-- DROP TABLE FaxNum;

-- AddressBook table
CREATE TABLE IF NOT EXISTS AddressBook (
abook_id       INT auto_increment KEY,
company        VARCHAR(255)
) DEFAULT CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS AddressBookEmail (
abookemail_id  INT auto_increment KEY,
abook_id       INT,
contact_name   VARCHAR(255),
contact_email  VARCHAR(255) NOT NULL
) DEFAULT CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS AddressBookFAX (
abookfax_id    INT auto_increment KEY,
abook_id       INT,
faxnumber      VARCHAR(20) NOT NULL,
email          VARCHAR(100),
description    VARCHAR(30),
to_person      VARCHAR(150),
to_location    VARCHAR(150),
to_voicenumber VARCHAR(150),
faxcatid       INT,
faxfrom        INT DEFAULT 0,
faxto          INT DEFAULT 0
) DEFAULT CHARACTER SET utf8;
