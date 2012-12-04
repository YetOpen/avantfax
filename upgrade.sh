#!/bin/sh
#
# AvantFAX upgrade script
#
# This script will save your local_config.php file and upgrade the new AvantFAX files.
# Also, this script will remove all of the older PHP, JS, CSS, and TPL files in order 
# to remove any lingering files
#

. rh-prefs.txt

echo Backing up local_config.php

cp -a $INSTDIR/includes/local_config.php .

echo Removing old files

find $INSTDIR -name "*.php" -exec rm -f {} \;
find $INSTDIR -name "*.js"  -exec rm -f {} \;
find $INSTDIR -name "*.css" -exec rm -f {} \;
find $INSTDIR -name "*.tpl" -exec rm -f {} \;

echo Copying new files

chmod 0755 avantfax/includes/faxcover.php avantfax/includes/faxrcvd.php avantfax/includes/notify.php avantfax/includes/avantfaxcron.php
chmod 0755 avantfax/tools/*.php

rsync -rvu avantfax/ $INSTDIR/

cp -a local_config.php $INSTDIR/includes/local_config.php

chown -R $HTTPDUSER:$HTTPDGROUP $INSTDIR/
chown $HTTPDUSER:uucp $INSTDIR/tmp/
chmod 0770 $INSTDIR/tmp/

echo Done
echo
echo Now you must check if there is a new db-update file from your the last version of AvantFAX to this one
echo "For example, if you're upgrading from AvantFAX 3.0.0, you must import the db-update-302.sql, db-update-306.sql, db-update-307.sql files"
echo "Example: mysql -uavantfax -pd58fe49 avantfax < db-update-311.sql"