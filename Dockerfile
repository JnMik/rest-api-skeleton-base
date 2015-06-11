#vim:set ft=dockerfile:
FROM crakmedia/php56-fpm-nginx

MAINTAINER Crakmedia <docker@crakmedia.com>

# Add application code
ADD . /srv/www
