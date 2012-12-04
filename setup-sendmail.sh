#!/bin/sh
#
# This script will configure sendmail for email to fax
# Only run once
#

. email2fax.txt

# INSTALL REQUIRED PACKAGES

echo "Installing required packages"

yum -y install sendmail sendmail-cf

# CONFIGURE SENDMAIL FOR EMAIL TO FAX

echo "Configuring sendmail for Email to FAX for domain ${FAXDOMAIN}"

#echo $HTTPDUSER >> /etc/mail/trusted-users
cp /etc/mail/sendmail.mc /etc/mail/sendmail.mc-orig
cat /etc/mail/sendmail.mc | grep -v "Port=smtp,Addr=127" > /etc/mail/sendmail.mc-new
cat >> /etc/mail/sendmail.mc-new << EOF
DAEMON_OPTIONS(\`Port=smtp, Name=MTA')dnl
define(\`FAX_MAILER_PATH',\`/usr/bin/faxmail')dnl
define(\`FAX_MAILER_ARGS',\`faxmail -NT \$u@\$h \$f')dnl
MAILER(\`fax')dnl

EOF

mv /etc/mail/sendmail.mc-new /etc/mail/sendmail.mc

echo $FAXDOMAIN >> /etc/mail/local-host-names
echo -e "@${FAXDOMAIN}\tfax@%1.fax" >> /etc/mail/virtusertable

make -C /etc/mail
/sbin/service sendmail restart


cat > /etc/hylafax/faxmail.conf << EOF
AutoCoverPage: false
TextFont: Verdana
TextPointSize: 12pt
Headers: Message-id Date Subject From
MailUser: $FAXMAILUSER

EOF

echo "Done"

# DONE #
