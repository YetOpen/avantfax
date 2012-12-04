-- AvantFAX 3.2.0 MySQL structure

-- Distribution Lists
CREATE TABLE IF NOT EXISTS DistroList (
dl_id           INT auto_increment KEY,
listname        VARCHAR(255) NOT NULL,
listdata        TEXT,
lastmod_date    TIMESTAMP,
lastmod_user    INT
) DEFAULT CHARACTER SET utf8;


-- MODEMS
CREATE TABLE IF NOT EXISTS Modems (
devid           INT auto_increment KEY,
device          VARCHAR(10) NOT NULL,
alias           VARCHAR(40),
contact         VARCHAR(100),
printer	        VARCHAR(100),
faxcatid        INT
) DEFAULT CHARACTER SET utf8;


-- COVER PAGES
CREATE TABLE IF NOT EXISTS CoverPages (
cover_id        INT auto_increment KEY,
title           VARCHAR(64) NOT NULL,
file            VARCHAR(255) NOT NULL
) DEFAULT CHARACTER SET utf8;


-- USER INFORMATION
-- password is md5 hash and always 32 chars
CREATE TABLE IF NOT EXISTS UserAccount (
uid            INT auto_increment KEY,
name           VARCHAR(40),
username       VARCHAR(40) NOT NULL,
password       VARCHAR(32) NOT NULL,
email          VARCHAR(99) NOT NULL,
email_sig      TEXT,
user_tsi       VARCHAR(100),
from_company   VARCHAR(150),
from_location  VARCHAR(150),
from_voicenumber VARCHAR(150),
from_faxnumber VARCHAR(150),
coverpage_id   INT,
faxperpageinbox   INT,
faxperpagearchive INT,
superuser      BOOL DEFAULT FALSE,
can_del        BOOL DEFAULT FALSE,
last_mod       TIMESTAMP,
last_login     TIMESTAMP,
last_ip        VARCHAR(15),
language       VARCHAR(5),
modemdevs      TEXT,
didrouting     TEXT,
faxcats        TEXT,
pwdexpire      DATE,
pwdcycle       INT DEFAULT 0,
pwd_reuse      BOOL DEFAULT FALSE,
is_admin       BOOL DEFAULT FALSE,
wasreset       BOOL DEFAULT FALSE,
acc_enabled    BOOL DEFAULT TRUE,
deleted        BOOL DEFAULT FALSE,
any_modem      BOOL DEFAULT FALSE
) DEFAULT CHARACTER SET utf8;


-- store hashes of passwords already used for a user
CREATE TABLE IF NOT EXISTS UserPasswords (
upid           INT auto_increment KEY,
uid            INT NOT NULL,
pwdhash        VARCHAR (32) NOT NULL
) DEFAULT CHARACTER SET utf8;


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
faxto          INT DEFAULT 0,
printer        VARCHAR(100)
) DEFAULT CHARACTER SET utf8;


-- DID Routing
CREATE TABLE IF NOT EXISTS DIDRoute (
didr_id         INT auto_increment KEY,
routecode       VARCHAR(10) NOT NULL,
alias           VARCHAR(40),
contact         VARCHAR(100),
printer		VARCHAR(100),
faxcatid        INT
) DEFAULT CHARACTER SET utf8;


-- Barcode Route
CREATE TABLE IF NOT EXISTS BarcodeRoute (
barcode_id      INT auto_increment KEY,
barcode         TEXT,
alias           VARCHAR(40),
contact         VARCHAR(100),
printer		VARCHAR(100),
faxcatid        INT
) DEFAULT CHARACTER SET utf8;


-- ARCHIVE
-- companyid for outgoing faxes
CREATE TABLE IF NOT EXISTS FaxArchive (
fid            INT auto_increment KEY,
faxnumid       INT,
companyid      INT,
faxpath        VARCHAR(255) NOT NULL,
pages          INT,
faxcatid       INT,
didr_id        INT,
description    TEXT,
lastoperation  TIMESTAMP,
lastmoduser    INT,
lastmoddate    TIMESTAMP,
archstamp      TIMESTAMP,
modemdev       VARCHAR(10),
userid         INT,
origfaxnum     VARCHAR(20),
faxcontent     TEXT,
inbox          BOOL DEFAULT TRUE
) DEFAULT CHARACTER SET utf8;


CREATE TABLE IF NOT EXISTS FaxCategory (
catid         INT auto_increment KEY,
name          VARCHAR(30)
) DEFAULT CHARACTER SET utf8;


-- AvantFAX System Log
CREATE TABLE IF NOT EXISTS SysLog (
syslogid      INT auto_increment KEY,
logdate       TIMESTAMP,
logtext       TEXT
) DEFAULT CHARACTER SET utf8;


-- DynConf table for Blacklisting
CREATE TABLE IF NOT EXISTS DynConf (
dynconf_id      INT auto_increment KEY,
device          VARCHAR(20),
callid          VARCHAR(100)
) DEFAULT CHARACTER SET utf8;


INSERT INTO UserAccount SET name='AvantFAX Admin', username='admin', password='5f4dcc3b5aa765d61d8327deb882cf99', wasreset=TRUE, email='root@localhost', is_admin = TRUE, language = 'en', acc_enabled = TRUE, any_modem = TRUE, superuser = TRUE;
INSERT INTO UserPasswords SET uid=1, pwdhash='5f4dcc3b5aa765d61d8327deb882cf99';

INSERT INTO AddressBook SET company = 'XXXXXXX';
INSERT INTO AddressBookFAX SET abook_id = 1, faxnumber = 'XXXXXXX';

INSERT INTO CoverPages SET title='Generic A4', file='cover.ps';
INSERT INTO CoverPages SET title='Generic Letter', file='cover-letter.ps';
INSERT INTO CoverPages SET title='Generic HTML', file='coverpage.html';

-- SHOW TABLES;
