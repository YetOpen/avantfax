-- Database update for 3.0.7

-- DynConf table for Blacklisting
CREATE TABLE IF NOT EXISTS DynConf (
dynconf_id      INT auto_increment KEY,
device          VARCHAR(20),
callid          VARCHAR(100)
) DEFAULT CHARACTER SET utf8;


ALTER TABLE UserAccount ADD user_tsi VARCHAR(100);

