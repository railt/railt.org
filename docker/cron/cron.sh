#!/bin/bash

service rsyslog restart

/etc/init.d/cron start

touch /var/log/cron.log
chmod 0755 /var/log/cron.log

tail -f /var/log/cron.log
