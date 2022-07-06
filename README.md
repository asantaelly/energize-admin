## Smart Fuel Filling Station - Administration
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)


This is a web application for smart fuel filling station mobile app, where all the adminstration work will be done.

### Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

#### System Requirement

    - PHP - 8.0+
    - Laravel - 9.0+
    - MariaDB - 10.4.24
    - Composer - 2.3.7


Clone this repository to your local machine.

```
git clone https://github.com/asantaelly/smart_station_web_app.git
```

### Installation Process

Install project dependencies

```
composer install
```

Create database and copy .env.example to .env and put credentials of database created.

Run a command to migrate database schemas

```
php artisan migrate
```

Run a command to seed database with prepared data

```
php artisan db:seed
```

Create admin or super user with following commands

```
php artisan make:admin
```

Now you can run project in your browser using the following command

```
php artisan serve
```

Open your browser to  http://127.0.0.1:8000/

Enter your credentials to continue


## Running the tests

Currently this project has no tests


## Deployment

Currently this system is hosted at http://smart-station.herokuapp.com


## License

* **GNU General** - [License](https://github.com/asantaelly/smart_station_web_app/blob/main/LICENSE.md) 

