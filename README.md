DefaultService
===================

Service for ...

Installation
------------

Install vendors

    $ composer install

Set your environment variables to define database access. For example, in your nginx config file

    location @site {
        ...
        fastcgi_param API_DB_NAME db_crakpass;
        fastcgi_param API_DB_USER root;
        fastcgi_param API_DB_PWD password;
        fastcgi_param API_DB_DRIVER pdo_mysql;
        fastcgi_param API_DB_MEMORY false;        ...
    }

Migrations
------------

Run migrations

    $ php app/console migrations:migrate

Tests
------------

Copy `test/config.yml.dist` to `test/config.yml` and configure your test database

Unit tests

    $ phpunit

Functional tests

    $ bin/behat

Generate doc
------------

Install apidoc

    $ npm install apidoc -g

Generate doc

    $ apidoc -i src/Controller/ -o doc

Launch `doc/index.html` with your browser.

Dockerize the service
---------------------

    $ composer install

    $ docker build -t crakmedia/skeleton-service:latest .

    $ docker-compose up

Monitor your metrics
--------------------

In order to monitor metrics of application, you should use $app['monitor']. For more information about how to use, see
[documentation of the client](https://github.com/thephpleague/statsd)
