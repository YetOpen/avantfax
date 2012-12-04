# AvantFAX RPM spec
#rpm --eval '%{_sourcedir}'
#rpmbuild -ba --target noarch SPECS/avantfax.spec
#
#
# # /etc/avantfaxrpm.conf
# # These are the database settings AvantFAX will create and use
# USER=avantfax
# PASS=d58fe49
# DB=avantfax
# # if the MySQL password for root is set, specify it here
# ROOTMYSQLPWD=
# # default password for HylaFAX apache account
# FAXRMPWD=pwd

%define _topdir	 	/root/rpm
%define name		avantfax
%define release		1
%define version 	3.3.1
%define buildroot	%{_topdir}/%{name}-%{version}-root
%define hylafax_spool	/var/spool/hylafax

BuildRoot:		%{buildroot}
BuildArchitectures: noarch

Summary:        Web application for managing faxes on HylaFAX fax servers
Group:          Applications/Communications
License:        GPL
URL:            http://www.avantfax.com/
Vendor:			iFAX Solutions, Inc.
Packager:		David Mimms

Name: 			%{name}
Version: 		%{version}
Release: 		%{release}
Source: 		%{name}-%{version}.tgz
# %{_sourcedir}/
# %{buildroot}
# %{buildroot}
# $RPM_BUILD_DIR

#	%define is_suse %(test -e /etc/SuSE-release && echo 1 || echo 0)
#	%define is_fedora %(test -e /etc/fedora-release && echo 1 || echo 0)

#	%define dist redhat
#	%define disttag rh

#	%if %is_suse
#	%define dist suse
#	%define disttag suse
#	%define kde_path /opt/kde3
#	%endif
#	%if %is_fedora
#	%define dist fedora
#	%define disttag rhfc
#	%endif

# Check if these packages are available on RHEL5:
# php-pecl-Fileinfo, php-pear-Mail-Mime, php-pear-Mail, php-pear-Net-SMTP, php-pear-MDB2-Driver-mysql

Requires: httpd, php, php-pear, php-mysql, php-mbstring, php-pear-Mail, php-pear-Mail-Mime, php-pear-Net-SMTP, php-pear-MDB2-Driver-mysql, mysql-server, libungif, libpng, sudo, libtiff, ghostscript, ghostscript-fonts, ImageMagick, vixie-cron, rsync, netpbm-progs

%description
AvantFAX is a web-based application for managing faxes on HylaFAX fax servers

##############################################################################################################
%prep
%setup -q
#%setup -n %{name}-%{version}

##############################################################################################################
%build

rm -rf %{buildroot}
mkdir -p %{buildroot}/var/www/ %{buildroot}/tmp/avantfax/

mv $RPM_BUILD_DIR/avantfax-%{version}/avantfax/ %{buildroot}/var/www/avantfax/
mv $RPM_BUILD_DIR/avantfax-%{version}/*         %{buildroot}/tmp/avantfax/

chown -R apache.apache %{buildroot}/var/www/avantfax/
chmod -R 0770 %{buildroot}/var/www/avantfax/tmp %{buildroot}/var/www/avantfax/faxes
chown -R apache.uucp %{buildroot}/var/www/avantfax/tmp %{buildroot}/var/www/avantfax/faxes

####### SETUP SMARTY #######
chmod 0770 \
    %{buildroot}/var/www/avantfax/includes/templates/admin_theme/templates_c/ \
    %{buildroot}/var/www/avantfax/includes/templates/admin_theme/cache/ \
    %{buildroot}/var/www/avantfax/includes/templates/main_theme/templates_c/ \
    %{buildroot}/var/www/avantfax/includes/templates/main_theme/cache/
chown apache:apache \
    %{buildroot}/var/www/avantfax/includes/templates/admin_theme/templates_c/ \
    %{buildroot}/var/www/avantfax/includes/templates/admin_theme/cache/ \
    %{buildroot}/var/www/avantfax/includes/templates/main_theme/templates_c/ \
    %{buildroot}/var/www/avantfax/includes/templates/main_theme/cache/
chmod 0755 \
    %{buildroot}/var/www/avantfax/includes/faxcover.php \
    %{buildroot}/var/www/avantfax/includes/faxrcvd.php \
    %{buildroot}/var/www/avantfax/includes/notify.php \
    %{buildroot}/var/www/avantfax/tools/update_contacts.php \
    %{buildroot}/var/www/avantfax/tools/faxcover.php \
    %{buildroot}/var/www/avantfax/includes/avantfaxcron.php \
    %{buildroot}/var/www/avantfax/includes/dynconf.php

##############################################################################################################
%install
# for building the package

##############################################################################################################
%pre
# flag: 1 = install, 2 = upgrade
# before installing the package

# /etc/avantfaxrpm.conf
# These are the database settings AvantFAX will create and use
USER=avantfax
PASS=d58fe49
DB=avantfax
# if the MySQL password for root is set, specify it here
ROOTMYSQLPWD=

export USER
export PASS
export DB
export ROOTMYSQLPWD

if [ -f /etc/avantfaxrpm.conf ]; then
	. /etc/avantfaxrpm.conf
fi

echo "### DB Settings: $USER $PASS $DB $ROOTMYSQLPWD"

/sbin/service mysqld status &>/dev/null

if [ ! $? -eq 0 ]; then
	echo "##########################################################################"
	echo "### Starting MySQL"
	/sbin/service mysqld start
fi

echo "### Testing root access for MySQL"
isthere=`mysql --user=root --password=$ROOTMYSQLPWD -e "select count(*) existe from user where User = '$USER'" mysql`

if [ ! $? -eq 0 ]; then
	echo  << EOF
Is there a root password set for MySQL?
EOF
	exit 1
fi

if [ "$1" = "1" ]; then
	if [ ! -d /var/lib/mysql/avantfax ]; then	# if database doesn't exist, create it
		echo "### Creating AvantFAX MySQL database"
		mysqladmin --default-character-set=utf8 --user=root --password=$ROOTMYSQLPWD create $DB
		
		if [ $? -eq 0 ]; then
			echo "### Creating $USER account with password $PASS for DB $DB"
			mysql --user=root --password=$ROOTMYSQLPWD -e "GRANT ALL PRIVILEGES ON $DB.* TO '$USER'@'localhost' IDENTIFIED BY \"$PASS\"" mysql
		fi
	fi
elif [ "$1" = "2" ]; then
	echo "### Backing up old AvantFAX into /root/avantfaxbackup"
	mkdir /root/avantfaxbackup &>/dev/null
	mysqldump --user=$USER --password=$PASS $DB > /root/avantfaxbackup/db_backup.sql
	cp -ru /var/www/avantfax/includes/local_config.php /var/www/avantfax/includes/config.php /var/www/avantfax/faxes/ /root/avantfaxbackup/
fi


##############################################################################################################
%post
# flag: 1 = install, 2 = upgrade
# after installing the package

#echo "Postinstall flag $1"

# SETUP AVANTFAX JOBFMT
if [ "$1" = "1" ]; then
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

fi

## SETUP DATABASE

# /etc/avantfaxrpm.conf
# These are the database settings AvantFAX will create and use
USER=avantfax
PASS=d58fe49
DB=avantfax
# if the MySQL password for root is set, specify it here
ROOTMYSQLPWD=
# default password for HylaFAX apache account
FAXRMPWD=pwd

export USER
export PASS
export DB
export ROOTMYSQLPWD
export FAXRMPWD

if [ -f /etc/avantfaxrpm.conf ]; then
	. /etc/avantfaxrpm.conf
fi

#echo "### DB Settings: $USER $PASS $DB $ROOTMYSQLPWD"

if [ "$1" = "1" ]; then		 # install database
	TABLES=`mysql --user=$USER --password=$PASS $DB -sNe "show tables"`
	if [ ! "$TABLES" ]; then
		mysql --user=$USER --password=$PASS $DB < /tmp/avantfax/create_tables.sql
	fi
elif [ "$1" = "2" ]; then	# upgrade database
	AVANTFAX_VERSION=`cat /root/avantfaxbackup/config.php |grep \'3 | awk -F "'" '1 { print  $2 }'`
	SHORTVERSION=`echo $AVANTFAX_VERSION| sed -e 's/\.//g'`
#	echo "### Checking for AvantFAX database upgrades to $AVANTFAX_VERSION"

	for i in `ls /tmp/avantfax/db-update-* -l | awk -F "-" '1 { print  $9 }' | awk -F "." '1 { print  $1 }'`; do
#		echo "### Checking db-update-$i.sql"
		if [ $i -gt $SHORTVERSION ]; then
			echo "### Applying db-update-$i.sql"
			mysql --user=$USER --password=$PASS $DB < /tmp/avantfax/db-update-$i.sql
		fi
	done
fi


####### DISABLE SELINUX FOR APACHE #######
#echo "Disabling SELinux for Apache"
setsebool -P httpd_disable_trans 1


####### CONFIGURE AVANTFAX VIRTUALHOST #######

if [ "$1" = "1" ]; then
	cat > /etc/httpd/conf.d/avantfax.conf << EOF
NameVirtualHost *:80

<VirtualHost *:80>
    DocumentRoot /var/www/avantfax
    ServerName avantfax
    ErrorLog logs/avantfax-error_log
    CustomLog logs/avantfax-access_log common
</VirtualHost>
EOF

	####### START MYSQL AND APACHE #######
	/sbin/service mysqld restart

	/sbin/service httpd status &>/dev/null

	if [ ! $? -eq 0 ]; then
		/sbin/service httpd start
	else
		/sbin/service httpd restart
	fi
fi

####### SYMLINK AVANTFAX SCRIPTS #######

echo "CoverCmd:		/var/www/avantfax/includes/faxcover.php" >> /etc/hylafax/sendfax.conf

if [ ! -f /var/www/avantfax/includes/local_config.php ]; then
	cp /var/www/avantfax/includes/local_config-example.php /var/www/avantfax/includes/local_config.php
fi

if [ ! -e "%{hylafax_spool}/bin/faxrcvd.php" ]; then
    ln -s /var/www/avantfax/includes/faxrcvd.php %{hylafax_spool}/bin/faxrcvd.php
fi

if [ ! -e "%{hylafax_spool}/bin/dynconf.php" ]; then
   ln -s /var/www/avantfax/includes/dynconf.php %{hylafax_spool}/bin/dynconf.php
fi

if [ ! -e "%{hylafax_spool}/bin/notify.php" ]; then
	ln -s /var/www/avantfax/includes/notify.php  %{hylafax_spool}/bin/notify.php
fi

####### FIX FILEINFO #######
for i in `ls /usr/share/file/magic*`; do
    if [ ! -e /usr/share/misc/`basename $i` ]; then
        ln -s $i /usr/share/misc/;
    fi 
done

#echo "### Configuring sudo"
####### SETUP SUDO PERMISSIONS #######
grep "apache ALL = NOPASSWD: /sbin/reboot, /sbin/halt, /usr/sbin/faxdeluser, /usr/sbin/faxadduser" /etc/sudoers &>/dev/null

if [ ! $? -eq 0 ]; then
    cat /etc/sudoers | grep -v requiretty > /tmp/avantfax/sudoers
    echo "apache ALL = NOPASSWD: /sbin/reboot, /sbin/halt, /usr/sbin/faxdeluser, /usr/sbin/faxadduser -u * -p * *" >> /tmp/avantfax/sudoers

    if [ ! -f /etc/sudoers.orig ]; then
        mv /etc/sudoers /etc/sudoers.orig
    fi
    mv /tmp/avantfax/sudoers /etc/sudoers
    chmod 0440 /etc/sudoers
    chown root.root /etc/sudoers
fi

####### Sendmail setting
if [ -f /etc/mail/trusted-users ]; then
  grep ^apache /etc/mail/trusted-users || echo apache >> /etc/mail/trusted-users
fi

####### CONFIGURE MODEMS TO USE AVANTFAX #######
if [ "$1" = "1" ]; then
	# Make backup of HylaFAX configuration
	if [ ! -d %{hylafax_spool}/etc/abackup ]; then
	    mkdir %{hylafax_spool}/etc/abackup &>/dev/null
	    cp -f %{hylafax_spool}/etc/config* %{hylafax_spool}/etc/hosts.hfaxd %{hylafax_spool}/etc/abackup/ &>/dev/null
	fi

	for i in `ls %{hylafax_spool}/etc/config.*`; do
	if [ "$i" != "%{hylafax_spool}/etc/config.sav" ]; then
	  if [ "$i" != "%{hylafax_spool}/etc/config.devid" ]; then
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


	grep "NotifyCmd:      bin/notify.php" %{hylafax_spool}/etc/config &>/dev/null
	if [ ! $? -eq 0 ]; then
	cat >>  %{hylafax_spool}/etc/config << EOF

#
## AvantFAX
#
NotifyCmd:      bin/notify.php

EOF
	fi

	####### ADD MODEMS TO AVANTFAX DATABASE #######
	for i in `ls %{hylafax_spool}/etc/config.* 2>/dev/null`; do
	if [ "$i" != "%{hylafax_spool}/etc/config.sav" ]; then
	  if [ "$i" != "%{hylafax_spool}/etc/config.devid" ]; then
	    tilde=`echo $i | grep '~'`
	    if [ "$?" -eq "1" ]; then
	      if [ -f $i ]; then
	        modem=`echo $i | awk -F'/' '{print $6}' | awk -F'.' '{print $2}'`
        
	        exists=`mysql --user=$USER --password=$PASS $DB -e "select count(*) existe from Modems where device='$modem'"`
	        if [ `echo $exists | awk -F' ' '{print $2}'` -eq 0 ]; then
	            # ADD MODEMS TO AVANTFAX DATABASE
				echo "Adding modem: $modem"
	            mysql --user=$USER --password=$PASS $DB -e "INSERT INTO Modems SET device='$modem', alias ='$modem'"
	        fi
	      fi
	    fi
	  fi
	fi
	done

	####### ADD CRONTAB ENTRIES #######
	if [ ! -f /etc/cron.d/avantfax ]; then
		printf "0 0 * * *\t/var/www/avantfax/includes/avantfaxcron.php -t 2\n" > /etc/cron.d/avantfax
	fi

	chown    apache.uucp /var/www/avantfax/tmp /var/www/avantfax/faxes
	chown -R apache.uucp /var/www/avantfax/faxes/recvd /var/www/avantfax/faxes/sent
#	chmod -R 777 /var/www/avantfax/faxes /var/www/avantfax/tmp

	####### CONFIGURE FAXMAIL #######
	if [ ! -f /etc/hylafax/faxmail.conf ]; then

	cat > /etc/hylafax/faxmail.conf << EOF
AutoCoverPage: false
TextPointSize: 12pt
Headers: Message-id Date Subject From
MailUser: faxmail

EOF
	fi

	IP=`/sbin/ifconfig eth0 | grep "inet addr" | awk -F' ' '{print $2}' | awk -F':' '{print $2}'`

	echo "###############################################################################"
	echo "Log into the AvantFAX Administrative interface at: http://$IP/admin/"
	echo -e "Username: admin\nPassword: password"
	echo "###############################################################################"
# end if new install
# elif [ "$1" = "2" ]; then
# 	echo "### Upgrading"
fi

echo "Done"

##############################################################################################################
# before uninstalling
#%preun
# flag: 0 = uninstall, 1 = upgrade
# executed during install flag 1

#echo "Preun Removing flag $1"

if [ "$1" = "0" ]; then
	rm -fr /var/www/avantfax/tmp/*
fi

##############################################################################################################
# after uninstalling
%postun
# flag: 0 = uninstall, 1 = upgrade

if [ "$1" = "0" ]; then
	echo "### Uninstalling (postun)"
	echo "### Removing HTTP virtual host"
	mv /etc/httpd/conf.d/avantfax.conf /etc/httpd/conf.d/avantfax.conf.rpmsave
	/sbin/service httpd restart
	
	echo "### Restoring HylaFAX settings"
	rm -f /etc/cron.d/avantfax %{hylafax_spool}/bin/notify.php %{hylafax_spool}/bin/faxrcvd.php %{hylafax_spool}/bin/dynconf.php

	cp -f %{hylafax_spool}/etc/abackup/config* %{hylafax_spool}/etc/
	
	if [ -f /etc/mail/trusted-users ]; then
		grep -v ^apache$ /etc/mail/trusted-users > /tmp/trusted-users
		mv /tmp/trusted-users /etc/mail/trusted-users
		chmod 0644 /etc/mail/trusted-users
		chown root.root /etc/mail/trusted-users
	fi
	
	/usr/sbin/faxdeluser apache

	# /etc/avantfaxrpm.conf
	# These are the database settings AvantFAX will create and use
	USER=avantfax
	PASS=d58fe49
	DB=avantfax
	# if the MySQL password for root is set, specify it here
	ROOTMYSQLPWD=

	export USER
	export PASS
	export DB
	export ROOTMYSQLPWD

	if [ -f /etc/avantfaxrpm.conf ]; then
		. /etc/avantfaxrpm.conf
	fi
	
	echo "### DB Settings: $USER $PASS $DB $ROOTMYSQLPWD"

	USERS=`mysql --user=$USER --password=$PASS $DB -sNe "select username from UserAccount"`

	for i in $USERS; do
	  /usr/sbin/faxdeluser $i
	done
	
	if [ -f /etc/sudoers.orig ]; then
	  mv /etc/sudoers.orig /etc/sudoers
	fi
	
	echo "### Removing user $USER"
	mysql --user=root --password=$ROOTMYSQLPWD -e "DROP USER '$USER'@'localhost'" mysql
	
	echo "### Removing database: $DB"
	mysqladmin --user=root --password=$ROOTMYSQLPWD --force drop $DB
	
	echo "### Done"
elif [ "$1" = "1" ]; then 
#	echo "### Upgrading (postun)"
fi

##############################################################################################################
%clean
rm -rf %{buildroot}

##############################################################################################################
# basic contains some reasonable sane basic tiles
%files
%defattr(-, apache, apache)
/var/www/avantfax/
/tmp/avantfax/

##############################################################################################################
%changelog
* Tue Mar  2 2010 David Mimms <david@avantfax.com>
- improved package

* Mon Feb  1 2010 David Mimms <david@avantfax.com>
- initial package
