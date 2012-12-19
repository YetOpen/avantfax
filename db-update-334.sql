-- Database update for 3.3.4
ALTER TABLE  `AddressBookFAX` 
    ADD `to_address` VARCHAR( 50 ) NOT NULL AFTER  `to_location` ,
    ADD `to_city` VARCHAR( 50 ) NOT NULL AFTER  `to_address`
