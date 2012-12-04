-- Database update for 3.1.6

ALTER TABLE UserAccount change modemdevs modemdevs TEXT;
ALTER TABLE UserAccount change didrouting didrouting TEXT;
ALTER TABLE UserAccount change faxcats faxcats TEXT;
