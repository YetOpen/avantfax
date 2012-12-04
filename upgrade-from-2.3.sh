#!/bin/sh
#
# AvantFAX install script
#

. rh-prefs.txt

## SETUP SMARTY (for AvantFAX 3.0)
chmod 0770 avantfax/includes/templates/admin_theme/templates_c/ avantfax/includes/templates/admin_theme/cache/  avantfax/includes/templates/main_theme/templates_c/ avantfax/includes/templates/main_theme/cache/
chown $HTTPDUSER:$HTTPDGROUP avantfax/includes/templates/admin_theme/templates_c/ avantfax/includes/templates/admin_theme/cache/  avantfax/includes/templates/main_theme/templates_c/ avantfax/includes/templates/main_theme/cache/

chmod 0755 avantfax/includes/faxcover.php avantfax/includes/faxrcvd.php avantfax/includes/notify.php avantfax/tools/update_contacts.php avantfax/tools/faxcover.php avantfax/includes/avantfaxcron.php avantfax/includes/dynconf.php

echo "Removing old AvantFAX files"

find $INSTDIR -name "*.php" -exec rm -f {} \;
find $INSTDIR -name "*.js" -exec rm -f {} \;
find $INSTDIR -name "*.css" -exec rm -f {} \;

echo "Upgrading to AvantFAX 3"

rsync -rvu ./avantfax/ $INSTDIR/
chown -R $HTTPDUSER:$HTTPDGROUP $INSTDIR/
chmod -R 0770 $INSTDIR/tmp $INSTDIR/faxes
chown -R $HTTPDUSER.uucp $INSTDIR/tmp $INSTDIR/faxes

echo "Upgrading PEAR libs"

pear channel-update pear.php.net
pear upgrade-all
pear install MDB2_driver_mysql

echo "Restarting Apache"

/sbin/service httpd restart

echo "Upgrading AvantFAX database schema"

mysql -u$USER -p$PASS $DB < db-update-300.sql
mysql -u$USER -p$PASS $DB < db-update-302.sql
mysql -u$USER -p$PASS $DB < db-update-306.sql
mysql -u$USER -p$PASS $DB < db-update-307.sql
mysql -u$USER -p$PASS $DB < db-update-311.sql
mysql -u$USER -p$PASS $DB < db-update-315.sql
mysql -u$USER -p$PASS $DB < db-update-316.sql
mysql -u$USER -p$PASS $DB < db-update-320.sql

# SYMLINK AVANTFAX SCRIPTS

ln -s $INSTDIR/includes/faxrcvd.php $SPOOL/bin/faxrcvd.php
ln -s $INSTDIR/includes/dynconf.php $SPOOL/bin/dynconf.php
ln -s $INSTDIR/includes/notify.php  $SPOOL/bin/notify.php

# CONFIGURE MODEMS TO USE AVANTFAX

for i in `ls $SPOOL/etc/config.*`; do
if [ "$i" != "$SPOOL/etc/config.sav" ]; then
  if [ "$i" != "$SPOOL/etc/config.devid" ]; then
    tilde=`echo $i | grep '~'`
    if [ "$?" -eq "1" ]; then
      if [ ! -L $i ]; then
cat >> $i << EOF
#
## AvantFAX
#
FaxrcvdCmd:     bin/faxrcvd.php
DynamicConfig:  bin/dynconf.php
UseJobTSI:      true

EOF
      fi
    fi
  fi
fi
done


cat >>  $SPOOL/etc/config << EOF
#
## AvantFAX
#
NotifyCmd:      bin/notify.php

EOF


echo "Updating crontab"

crontab -l | grep -v remold > old-cron
crontab old-cron
rm -f old-cron
printf "0 0 * * *\t$INSTDIR/includes/avantfaxcron.php -t 2\n" > /etc/cron.d/avantfax

echo "Updating contacts"

cd $INSTDIR/tools
./update_contacts.php

echo "Your admin account is now called 'admin' with password 'password'"
echo Done
