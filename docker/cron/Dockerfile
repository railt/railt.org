FROM railt_org:latest

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
    && apt-get clean

#####################################
# Crontab
#####################################

COPY ./crontab /etc/cron.d
RUN chmod 0644 /etc/cron.d

RUN mkfifo --mode 0666 /var/log/cron.log

CMD ["/bin/bash", "-c", "cron && tail -f /var/log/cron.log"]
