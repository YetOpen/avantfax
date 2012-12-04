-- Database update for 3.2.0

-- COVER PAGES
CREATE TABLE IF NOT EXISTS CoverPages (
cover_id        INT auto_increment KEY,
title           VARCHAR(64) NOT NULL,
file            VARCHAR(255) NOT NULL
) DEFAULT CHARACTER SET utf8;

INSERT INTO CoverPages SET title='Generic A4', file='cover.ps';
INSERT INTO CoverPages SET title='Generic Letter', file='cover-letter.ps';
INSERT INTO CoverPages SET title='Generic HTML', file='coverpage.html';

ALTER TABLE UserAccount ADD coverpage_id   INT;
