# CSCI 2479 Example App

## New section for demo purposes

## Intro
This is an example Laravel application that is used in our lecture/demo sessions every week. It is based on the same Laravel Sail/Laravel Breeze setup that we use as a skeleton for the group projects, and is where you can find examples of how to do various things.

## Setup/Installation
1. use git to clone the repo
2. `cd` into the project folder

3. run this command to install the sail dependencies:

```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php80-composer:latest \
composer install --ignore-platform-reqs
```

4. copy the `.env.example` file to a new file named `.env`
5. in your .env file, change the DB_HOST value from 127.0.0.1 to mysql
6. in your .env file, change the DB_USERNAME value to sail
7. in your .env file, change the DB_PASSWORD to password
8. run vendor/bin/sail up -d (which will build and run all of your docker containers, will take a while the first time)
9. run vendor/bin/sail artisan key:generate (which will add a new key to your .env file)
10. run the database migrations to build your database tables: vendor/bin/sail artisan migrate
11. go to http://localhost in your browser
12. try out the login/registration functionality

## Xdebug Setup
This project is now configured to use XDebug for remote debugging with VS Code. For this to work, ensure the following is setup properly:
1. your `.env` file should include the setting `SAIL_XDEBUG_MODE=true`
2. your VS Code instance should have the [PHP Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) extension installed under WSL:UBUNTU
3. you will need to rebuild your PHP docker image to get the XDEBUG config values: `sail up --build -d`
4. test your setup by setting a breakpoint in a PHP file (e.g. the HomeController) and verifying you can stop on a breakpoint
