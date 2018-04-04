FROM railt_org:latest

USER root

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
    apt-get install -my wget gnupg

# Install dotdeb repo
RUN echo "deb http://packages.dotdeb.org jessie all" > /etc/apt/sources.list.d/dotdeb.list \
    && curl -sS https://www.dotdeb.org/dotdeb.gpg | apt-key add - \
    && apt-get update

# Install required libs
RUN apt-get update && \
    apt-get install -y \
        cron \
        rsyslog \
    && apt-get clean


#####################################
# Rsyslog
#####################################

COPY ./rsyslog.conf /etc/rsyslog.conf
RUN service rsyslog restart

#####################################
# Crontab
#####################################

COPY ./crontab /var/spool/cron/crontabs/root

ADD ./cron.sh /cron.sh
RUN chmod 0755 /cron.sh

CMD ["/cron.sh"]
