FROM railt_org:latest

USER root

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        apt-utils \
        supervisor \
        python-pip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

USER root

#
# Install dependencies
#
RUN pip install --upgrade setuptools
RUN pip install wheel
RUN pip install ez_setup
RUN pip install supervisor-stdout

RUN usermod -u 1000 www-data
COPY conf.d/queue.default.conf /etc/supervisor/conf.d/queue.default.conf

WORKDIR /etc/supervisor/conf.d/

CMD ["supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
