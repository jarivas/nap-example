# Nap server example 

I have created this example to help in getting started with this really easy framework.

### Getting started

#### Docker
* `docker-compose up -d`
* `docker exec -it idealista-server php ./commands/createDbClasses.php`
* `docker exec -it idealista-server chmod -R 777 /var/www`

#### Composer
* `cd app`
* `composer install`

#### Folders structure
* **app/src** is where your code is going to be.
* **app/config** is where the config.ini file should be, later on explained.
* **app/log** Where all the files log are going to be stored if you use FileLogger
* **app/public**  is the entry point of the application, the real request will go throught *index.php*
* **app/commands** php commands to help install and set up environment

#### Config
* In order the application to work config/config.ini should exists
* Defines application environment values **system**
* Defines what modules exists **Ad**, but many more can be defined
* Defines what actions are allowed, if required to be authentified, or if is an command line action only
* Can define DB information in case you need it
* Defines required fields for the actions, how to sanitize and validate them, even give default value
* Check config/config.ini.example for better understanding

#### Authentication
Here lies the class name of what have you implemented, plus extra info you may need

### Summary
The general idea, is using a release from [here](https://github.com/jarivas/nap) as basic lib, just modifying the ini file and adding modules and actions, you can get server working in no time.
