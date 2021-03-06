# REST API Skeleton

This is a kickoff project to create an API rest in few minutes.
There is also some stuff in place to help you use the Skeleton with Docker.
Using this skeleton, your api will handle crud methods get, post, put, delete as well as paging.
The api could able to handle Hateoas resolving, sorting and joins on table, but the feature here is far from being perfect.

Here's basic usage example :

    http://localhost:9080/1.0/exemple
    http://localhost:9080/1.0/exemple/1
    http://localhost:9080/1.0/exemple?id[]=2&id[]=6
    http://localhost:9080/1.0/exemple?id!![]=6&id!![]=8&limit=500

It's not perfect, but I encourage you to improve it and submit a PR.

# APACHE VHOST

Useful if you are not able to use docker or nginx, here's a fallback for apache.

      <VirtualHost *:80>
           ServerName some.localdomain

           ## Vhost docroot
           DocumentRoot "/var/www/rest-api-skeleton-base/web"
           DirectoryIndex index.php

           <Directory "/var/www/rest-api-skeleton-base/web">
             <IfModule mod_rewrite.c>
               Options -MultiViews
               RewriteEngine On
               RewriteCond %{REQUEST_FILENAME} !-f
               RewriteRule ^ index.php [QSA,L]
             </IfModule>
           </Directory>

           ## Logging
           ErrorLog "/var/log/apache2/rest-api-skeleton-base_error.log"
           ServerSignature Off
           CustomLog "/var/log/apache2/rest-api-skeleton-base_access.log" combined
         </VirtualHost>

# Test this API skeleton to understand what it does

- Please copy envConfig.dist.php to envConfig.php and configure it

- If you are using docker, copy docker-compose.yml.dist to docker-compose.yml

- At this point, you can already test the tool. Import the exemple database /tests/exemple_dbname.sql and try it for yourself.

# Create new API -- Getting Started

These next steps will help you to create Models and Controllers, but know that all of this can be generated if your tables respect our API standards.

Standards are simple : 

- All your database tables MUST implement at least 2 columns : id and deleted. 

- table and field names must respect the snake_case standard.
    	
Once your database is ready, here's some example for the generation of the Api: 

	Keep in mind that generated files per default are in a temporary folder, so you can double check them.

	Generate an api with a route for all tables :
	php app/console.php support3w:generate-api-from-db "Your\Api\Namespace"  
	
	Generate an api with only 1 route :
	php app/console.php support3w:generate-api-from-db "Your\Api\Namespace" specific_table_name 
	
	Skip the temporary folder and generate the files directly in the source folder.
	php app/console.php support3w:generate-api-from-db "Your\Api\Namespace" --write_in_src_folder

You can also skip the generation tool and proceed with the next 2 steps

- Create Models that will match your database schema, don't forget to use the interface

- Create your controllers in src/Controller, extends the ControllerBase all a bunch of methods will be ready to go (create, find, findByParameters, delete, update)

And then ...

- Define routings that your API will need in app/routing.php

- The controllers will need to be registered to the application, but first, please create a repository to manage your Model.

    Something like that in the /app/app.php, another file could be create as well to store them
    Main table Alias will be use for queries, in this example SELECT * from exemple_tablename E
    fieldTableAlias are necessary when your repository feth more than one table in queries, but could be refactored in better code.
    Using the DefaultRepository will provide you with all ready to use methods like [count, fetchAll, findById, findByParameters, create, update, delete, findNext, findPrevious and other private methods]
    If you think your repository will have more custom needs, please create a new repository in src/Repository and extends RepositoryBase directly.

```
    $app['example.repository'] = $app->share(
        function () use ($app) {
            $fieldTableAlias = array(
                'id' => 'E',
                'some_foreign_column' => 'some_foreign_table_alias'
            );
            $mainTableAlias = 'E';
            return new DefaultRepository($app['db'], 'exemple_tablename', $fieldTableAlias, $mainTableAlias);
        }
    );
```

- Now register these controllers in src/Provider/ControllerProvider.php

[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)
[![Build Status](https://travis-ci.org/CrakLabs/skeleton-service.svg)](https://travis-ci.org/CrakLabs/rest-normalizer)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/16996788-c5c9-4f59-817e-23592755f98d.svg)](https://insight.sensiolabs.com/projects/16996788-c5c9-4f59-817e-23592755f98d)
[![License](https://img.shields.io/packagist/l/craklabs/skeleton-service.svg)](https://packagist.org/packages/craklabs/skeleton-service)

# Getting started

    $ docker build -t crakmedia/skeleton-service:latest .
    
    $ cp docker-compose.yml.dist docker-compose.yml

    $ docker-compose run shell

        $ composer install

    $ docker-compose up


# Overriding default settings

Should over need to override the default configuration for any of the services
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

# Migrations

Run migrations

    $ docker-compose run shell

    $ php app/console migrations:migrate

# Tests

First, go in your container shell

    $ docker-compose run shell

Copy `tests/config.yml.dist` to `tests/config.yml` and configure your test database

    $ cp tests/config.yml.dist tests/config.yml

Functional tests

    $ bin/behat

# Generate doc

Install apidoc

    $ npm install apidoc -g

Generate doc

    $ apidoc -i src/Controller/ -o doc

Launch `doc/index.html` with your browser.


# Monitor your metrics

In order to monitor metrics of application, you should use $app['monitor']. For more information about how to use, see
[documentation of the client](https://github.com/thephpleague/statsd)

# Hints

If you are using docker and have connection timeout to the database, you should not use localhost a db_host, use your local IP instead.


# Debugging

Setting ENV = 'prod'; in envConfig.php will remove dev_details from jsonResponse when an error is thrown.
Make sure you have ENV = 'dev'; if you want to investigate errors

# Contributors

- Crakmedia
- Support3w

