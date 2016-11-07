#vim:set ft=dockerfile:
FROM jnmik/php56-fpm-nginx

MAINTAINER Crakmedia <docker@crakmedia.com>

# Add application code
ADD . /srv/www

WORKDIR /srv/www

RUN yum install -y wget

