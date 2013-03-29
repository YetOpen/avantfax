-- Database update for 3.3.5
ALTER TABLE  `UserAccount` 
    ADD `audiofile` VARCHAR( 50 ) NULL AFTER  `coverpage_id` 
