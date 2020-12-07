# Nap server example 

A Linkedin like system as excuse I have created this example to help in getting started with this really easy framework.

### Getting started

#### Folders structure
* **Api** is where your code is going to be.
* **config** is where the config.ini file should be, later on explained.
* **Core** is where the framework is, only care if want to extend it, do not forget add test to it.
* **instaler** for this system in particular I have created a user installer to locally, so that endpoint won't be expose in production.
* **public**  is the entry point of the application, the real request will go throught *api.php*, and the console endpoints *cli.php*.
* **Test** Host different kind of test, the *Unit* folder is where the framework test are, *Functional* where Api test are. I am using Visual Studio Code Rest plug in for this one.
* **tools** A couple of tools for code formatting and testing, requires composer.

#### Config
* To be continued