#vim:set ft=dockerfile:
FROM crakmedia/php56-fpm-nginx

MAINTAINER Crakmedia <docker@crakmedia.com>

# Add application code
ADD . /srv/www

WORKDIR /srv/www
COPY ./docker/api.conf /etc/nginx/conf.d/api.conf

RUN yum install -y wget

