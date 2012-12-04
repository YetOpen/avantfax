#!/bin/sh
# to use after upgrading HylaFAX

. rh-prefs.txt

mv $HYLADIR/bin/faxcover $HYLADIR/bin/faxcover.old
ln -s $INSTDIR/includes/faxcover.php $HYLADIR/bin/faxcover
