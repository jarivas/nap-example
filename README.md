# Nap server example 

A Linkedin like system as excuse, I have created this example to help in getting started with this really easy framework.

### Getting started

#### Folders structure
* **Api** is where your code is going to be.
* **config** is where the config.ini file should be, later on explained.
* **Core** is where the framework is, only care if want to extend it, do not forget add test to it.
* **installer** for this system in particular I have created a user installer to locally, so that endpoint won't be expose in production.
* **log** Where all the files log are going to be stored by default, if you want a costumized solution, just change the trait Api\Logger end voila!
* **public**  is the entry point of the application, the real request will go throught *api.php*, and the console endpoints *cli.php*.
* **Test** Host different kind of test, the *Unit* folder is where the framework test are, *Functional* where Api test are. I am using Visual Studio Code Rest plug in for this one.
* **tools** A couple of tools for code formatting and testing, requires composer.

#### Config
* In order the application to work config/config.ini should exists
* Defines application environment values **system**
* Defines DB information
* Defines what modules exists **user**, **personalData** ...
* Defines what actions are allowed, if required to be authentified, or if is an command line action only
* Defines required fields for the actions, how to sanitize and validate them, even give default value
* Check config/config.ini.example for better understanding

#### Authentication
Right now there is a basic but functional token auth system, if you want to improved just rewrite Api\Authentication, use Core\BaseAuthentication as example

### Summary
The general idea, is using a release from [here](https://github.com/jarivas/nap) as basic skeleton, just modifying the ini file and adding modules and actions to Api\Modules, you can get server working in no time.

Right now is using [SleekDb](https://sleekdb.github.io/), is an embed DB, soon I will make an mysql persistance class so it can be used in an swappable way 