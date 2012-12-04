#!/bin/sh
#
# This script will configure postfix for email to fax
# Only run once
#

. email2fax.txt

# INSTALL REQUIRED APPS IF NOT ALREADY INSTALLED

echo "Installing required packages"

yum -y install postfix || yast --install postfix || apt-get install postfix

# CONFIGURE POSTFIX

/sbin/service postfix stop

echo "Configuring Email to FAX for domain ${FAXDOMAIN}"

cat >> /etc/postfix/master.cf << EOF
fax       unix  -       n       n       -       1       pipe
  flags= user=$FAXMAILUSER argv=/usr/bin/faxmail -d -n -NT \${user}

EOF

echo -e "${FAXDOMAIN}\tfax:localhost" >> /etc/postfix/transport
echo -e "transport_maps = hash:/etc/postfix/transport\nfax_destination_recipient_limit = 1" >> /etc/postfix/main.cf

postmap /etc/postfix/transport

# CONFIGURE FAXMAIL

cat > /etc/hylafax/faxmail.conf << EOF 
AutoCoverPage: false
TextPointSize: 12pt
Headers: Message-id Date Subject From
MailUser: $FAXMAILUSER

EOF

/sbin/chkconfig postfix on
/sbin/service postfix start

echo "Done"

# DONE #
