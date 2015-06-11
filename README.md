Skeleton Service
===================

This project is intented to be a skeleton for PHP based services.

Getting started
===================

    $ composer install

    $ docker build -t crakmedia/skeleton-service:latest .

    $ cp docker-compose.yml.dist docker-compose.yml

    $ docker-compose up


Overriding default settings
==================

Should over need to override the default configuratio for any of the services
runing within the container, you can add docker volumes to your docker-compose.yml.
As an example, say you need to modify the default nginx configuration provided by
the base image. In this case you just need to add a new voluming mapping under the
volumes section in your docker-compose.yml file:


    volumes:
     ... existing mappings ...
     - /path/to/nginx.conf:/etc/nginx/nginx.conf

The following is a list of files/directories added in the base image, which could be
overriden:
  
    - /etc/nginx/conf.d
    - /etc/nginx/nginx.conf
    - /etc/php.ini
    - /etc/php-fpm.conf
    - /etc/php-fpm.d

Of course you can always use docker volumes to override any file/directory within a running
container. See [here](https://docs.docker.com/userguide/dockervolumes/) for more details.

Tests
==================

Unit tests

    $ phpunit

Functional tests

    $ bin/behat

Generate doc
==================

Install apidoc

    $ npm install apidoc -g

Generate doc

    $ apidoc -i src/Controller/ -o doc

Launch `doc/index.html` with your browser.


Monitor your metrics
==================

In order to monitor metrics of application, you should use $app['monitor']. For more information about how to use, see
[documentation of the client](https://github.com/thephpleague/statsd)
