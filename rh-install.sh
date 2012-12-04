#!/bin/sh
#
# AvantFAX install script for RH/CentOS/Fedora
# This script will configure /etc/sudoers and the HylaFAX hyla.conf, config, config.<devid> files
# Only run once
#

# CHECK IF HYLAFAX IS INSTALLED

echo "Checking for HylaFAX installation"

hyla=`which sendfax`
if [ "$?" -ne "0" ]; then
  echo You must install and configure HylaFAX first
  exit
fi

. rh-prefs.txt

if [ -z "$ROOTMYSQLPWD" -a -x /etc/init.d/mysqld ]; then
    echo "Warning: ROOTMYSQLPWD is not set but MySQL server is installed"
    echo "Pausing 10 seconds to give time to set ROOTMYSQL in rh-prefs.txt"
    echo "Hit Ctrl-C to quit"
    sleep 10
fi

# INSTALL REQUIRED PACKAGES

RPMS="$RPMS httpd"
RPMS="$RPMS php"
RPMS="$RPMS php-pear"
RPMS="$RPMS php-mysql"
RPMS="$RPMS php-mbstring"
RPMS="$RPMS mysql-server"
RPMS="$RPMS netpbm-progs"
#RPMS="$RPMS php-pecl-Fileinfo"
RPMS="$RPMS ImageMagick-devel"
RPMS="$RPMS libungif"
RPMS="$RPMS libpng"
RPMS="$RPMS sudo"
RPMS="$RPMS libtiff"
RPMS="$RPMS ghostscript"
RPMS="$RPMS ghostscript-fonts"
RPMS="$RPMS ImageMagick"
RPMS="$RPMS vixie-cron"
RPMS="$RPMS rsync"

# Added to get Pear packages from RPM, *NOT* from Pear downloads
RPMS="$RPMS php-pear-Mail-Mime"
RPMS="$RPMS php-pear-Mail"
RPMS="$RPMS php-pear-Net-SMTP"
RPMS="$RPMS php-pear-MDB2-Driver-mysql"

yum -y install $RPMS

rpm -q --whatprovides $RPMS | grep 'no package provides'
if [ $? -eq 0 ]; then
    echo "Error: failed to provide necessary RPM tools, exiting"
    exit 1
fi

#pear channel-update pear.php.net
#pear upgrade-all
#pear install Mail Net_SMTP Mail_mime MDB2_driver_mysql

echo "Installing AvantFAX and configuring HylaFAX"

## SETUP SMARTY
chmod 0770 \
    avantfax/includes/templates/admin_theme/templates_c/ \
    avantfax/includes/templates/admin_theme/cache/ \
    avantfax/includes/templates/main_theme/templates_c/ \
    avantfax/includes/templates/main_theme/cache/

chown $HTTPDUSER:$HTTPDGROUP \
    avantfax/includes/templates/admin_theme/templates_c/ \
    avantfax/includes/templates/admin_theme/cache/ \
    avantfax/includes/templates/main_theme/templates_c/ \
    avantfax/includes/templates/main_theme/cache/

chmod 0755 \
    avantfax/includes/faxcover.php \
    avantfax/includes/faxrcvd.php \
    avantfax/includes/notify.php \
    avantfax/tools/update_contacts.php \
    avantfax/tools/faxcover.php \
    avantfax/includes/avantfaxcron.php \
    avantfax/includes/dynconf.php

cp avantfax/includes/local_config-example.php avantfax/includes/local_config.php

if [ -f /etc/mail/trusted-users ]; then
  grep ^$HTTPDUSER$ /etc/mail/trusted-users || \
     echo $HTTPDUSER >> /etc/mail/trusted-users
fi

# SETUP AVANTFAX JOBFMT

HYLACONF=/etc/hylafax/hyla.conf

if [ -f /var/lib/hylafax/hfaxd.conf ]; then
	HYLACONF=/var/lib/hylafax/hfaxd.conf
fi

cat >> $HYLACONF << EOF

#
## JobFmt for AvantFAX
#
JobFmt: "%-3j %3i %1a %15o %40M %-12.12e %5P %5D %7z %.25s"

EOF

# START SERVICES ON BOOT

/sbin/chkconfig httpd on
/sbin/chkconfig mysqld on
/sbin/chkconfig hylafax on

# INSTALL AVANTFAX

mkdir -p $INSTDIR
cp -a avantfax/. $INSTDIR/.
chown -R $HTTPDUSER.$HTTPDGROUP $INSTDIR
chmod -R 0770 $INSTDIR/tmp $INSTDIR/faxes
chown -R $HTTPDUSER.uucp $INSTDIR/tmp $INSTDIR/faxes

# DISABLE SELINUX FOR APACHE

echo "Disabling SELinux for Apache"

setsebool -P httpd_disable_trans 1

# CONFIGURE AVANTFAX VIRTUALHOST

cat > /etc/httpd/conf.d/avantfax.conf << EOF
NameVirtualHost *:80

<VirtualHost *:80>
    DocumentRoot $INSTDIR
    ServerName avantfax
    ErrorLog logs/avantfax-error_log
    CustomLog logs/avantfax-access_log common
</VirtualHost>
EOF

# START MYSQL AND APACHE

/sbin/service mysqld restart
/sbin/service httpd restart

# IMPORT MYSQL DATABASE

echo "## Creating AvantFAX MySQL database ##"
# mysql --user=root --password=$ROOTMYSQLPWD -e "GRANT ALL ON $DB.* TO $USER@localhost IDENTIFIED BY \"$PASS\"" mysql
# mysqladmin --default-character-set=utf8 --user=$USER --password=$PASS create $DB
# mysql --user=$USER --password=$PASS $DB < create_tables.sql
# mysqlshow --user=$USER --password=$PASS $DB

echo "### Testing root access for MySQL"
userexists=`mysql --user=root --password=$ROOTMYSQLPWD -sNe "select count(*) existe from user where User = '$USER'" mysql`

if [ ! $? -eq 0 ]; then
	echo  << EOF
Is there a root password set for MySQL?
EOF
	exit 1
fi


if [ ! -d /var/lib/mysql/$DB ]; then	# if database doesn't exist, create it
	echo "### Creating MySQL database for web"
	mysqladmin --default-character-set=utf8 --user=root --password=$ROOTMYSQLPWD create $DB
	
	if [ $? -eq 0 ]; then
		if [ "$userexists" -eq "0" ]; then
			echo "### Creating $USER account with password $PASS for DB $DB"
			mysql --user=root --password=$ROOTMYSQLPWD -e "GRANT ALL PRIVILEGES ON $DB.* TO '$USER'@'localhost' IDENTIFIED BY \"$PASS\"" mysql
			
			echo "### Importing schema"
			mysql --user=$USER --password=$PASS $DB < create_tables.sql
		fi
	fi
fi


# SYMLINK AVANTFAX SCRIPTS

ln -s $INSTDIR/includes/faxrcvd.php $SPOOL/bin/faxrcvd.php
ln -s $INSTDIR/includes/dynconf.php $SPOOL/bin/dynconf.php
ln -s $INSTDIR/includes/notify.php  $SPOOL/bin/notify.php

echo "CoverCmd:		$INSTDIR/includes/faxcover.php" >> /etc/hylafax/sendfax.conf

# FIX FILEINFO

ln -s /usr/share/file/magic* /usr/share/misc/

# SETUP SUDO PERMISSIONS

echo "Setting up sudo"

cat /etc/sudoers | grep -v requiretty > /tmp/sudoers
echo "$HTTPDUSER ALL= NOPASSWD: /sbin/reboot, /sbin/halt, /usr/sbin/faxdeluser, /usr/sbin/faxadduser -u * -p * *" >> /tmp/sudoers

if [ ! -f /etc/sudoers.orig ]; then
  mv /etc/sudoers /etc/sudoers.orig
fi
mv /tmp/sudoers /etc/sudoers
chmod 0440 /etc/sudoers
chown root.root  /etc/sudoers

# Make backup of HylaFAX configuration

mkdir $SPOOL/etc/abackup
cp $SPOOL/etc/config* $SPOOL/etc/abackup/

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
FaxRcvdCmd:     bin/faxrcvd.php
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

# ADD MODEMS TO DATABASE

for i in `ls $SPOOL/etc/config.*`; do
	if [ "$i" != "$SPOOL/etc/config.sav" ]; then
		if [ "$i" != "$SPOOL/etc/config.devid" ]; then
			tilde=`echo $i | grep '~'`
			if [ "$?" -eq "1" ]; then
				if [ -f $i ]; then
					modem=`echo $i | awk -F'/' '{print $6}' | awk -F'.' '{print $2}'`

					exists=`mysql --user=$USER --password=$PASS $DB -sNe "select count(*) existe from Modems where device='$modem'"`
					if [ "$exists" -eq "0" ]; then
						# ADD MODEMS TO AVANTFAX DATABASE
						mysql --user=$USER --password=$PASS -e "INSERT INTO Modems SET device='$modem', alias ='$modem'" $DB
						echo "Configuring $modem for AvantFAX"
					fi
				fi
			fi
		fi
	fi
done

# ADD CRONTAB ENTRIES

echo "Setting up /etc/cron.d/avantfax"
printf "0 0 * * *\t$INSTDIR/includes/avantfaxcron.php -t 2\n" > /etc/cron.d/avantfax

echo -e "Installation complete\n\n"

IP=`/sbin/ifconfig eth0 | grep "inet addr" | awk -F' ' '{print $2}' | awk -F':' '{print $2}'`

echo -e "Log into the Administrative interface at: http://$IP/admin/"
echo -e "Username: admin\nPassword: password"

# DONE #
