#!/bin/sh
#
# AvantFAX uninstall script for RH/CentOS/Fedora
# This script will configure /etc/sudoers and the HylaFAX hyla.conf, config, config.<devid> files
#

. rh-prefs.txt

if [ -z "$ROOTMYSQLPWD" -a -x /etc/init.d/mysqld ]; then
    echo "Warning: ROOTMYSQLPWD is not set but MySQL server is installed"
    echo "Pausing 10 seconds to give time to set ROOTMYSQL in rh-prefs.txt"
    echo "Hit Ctrl-C to quit"
    sleep 10
fi

echo "Uninstalling AvantFAX and un-configuring HylaFAX"

# List users from database and remove them with faxdeluser

/usr/sbin/faxdeluser $HTTPDUSER

USERS=`mysql --user=root --password=$ROOTMYSQLPWD -sNe "select username from UserAccount" avantfax`

for i in $USERS; do
  /usr/sbin/faxdeluser $i
done

if [ -f /etc/mail/trusted-users ]; then
  grep -v ^$HTTPDUSER$ /etc/mail/trusted-users > /tmp/trusted-users
  mv /tmp/trusted-users /etc/mail/trusted-users
  chmod 0644 /etc/mail/trusted-users
  chown root.root /etc/mail/trusted-users
fi

rm -f /etc/httpd/conf.d/avantfax.conf

/sbin/service httpd restart


# REMOVE CRONTAB ENTRIES

rm -f /etc/cron.d/avantfax


# SYMLINK AVANTFAX SCRIPTS

rm -f $SPOOL/bin/faxrcvd.php $SPOOL/bin/dynconf.php $SPOOL/bin/notify.php

if [ -L $HYLADIR/bin/faxcover ]; then
   mv $HYLADIR/bin/faxcover.orig $HYLADIR/bin/faxcover
fi


# SETUP SUDO PERMISSIONS

echo "Replacing sudo with original"

if [ -f /etc/sudoers.orig ]; then
  mv /etc/sudoers.orig /etc/sudoers
fi

# replace original configuration files

if [ -d $SPOOL/etc/abackup/ ]; then
  cp -f $SPOOL/etc/abackup/* $SPOOL/etc/
fi

# DROP Database

echo "## Dropping AvantFAX MySQL database ##"
mysql --user=root --password=$ROOTMYSQLPWD -e "DROP USER $USER@localhost" mysql
mysqladmin --user=root --password=$ROOTMYSQLPWD --force drop $DB

# Remove AvantFAX directory

rm -fr $INSTDIR

echo "Done"

# DONE #
