# ReactPHP-REST-API

This is a basic example for an api based on ReactPHP library.<br>
It will show how to work with endpoints, and for this example we will use Games as a main item.

## Dev env settings

After cloning / downloading this repository please follow the next steps:

1. npm install - download and install all required npm packages
2. composer install - download and install all packages of PHP

### development npm packages

We will use a nodemon to run our servers with reloading on file change.<br>
To start nodemon process just type `npm run dev`, it will start the server.php

## Development CLI

After installing and downloading all the required packages from NPM and Composer you can use the rpc CLI tool to work
with this project.<br>
First, please run (in root project folder).<br>

```shell script
npm link
```

After running the `npm link` you can type<br>
On windows

```shell script
rpc --help
```

Or on Mac

```shell script
./rpc.js --help
```

When running the command you should see the help section of the CLI.<br>
<small>If you have any problem running the CLI please contact me</small>

## How to work with this project

All the data you will see in this REST API data, is managed via Helpers classes.<br>
The helpers can be found in the src folder under Helpers directory.<br>
The only reason the helpers are here, is to include an example data without the need to integrate DB.<br>
When you finish to develop your API please delete Helpers directory and files and use your real data.

## Available Endpoints

For this example we will use:

1. /games - GET
1. /games - GET (with game id)
2. /games - POST (with game id)
3. /games - DELETE (with game id)
4. /games - PUT (with game id)
3. /games - OPTIONS
4. /userbalance - GET (with user id)
5. /userbalance - PUT (with user id)
6. /userbalance - OPTIONS

## Controller

You can build a controller however you want.<br>
I decided to go on with the ReactPHP convention and to make an __invoke method. <br>
For every endpoint, can have multiple controllers files, when every file will be take care for single method.<br>
What it means is, that if I have endpoint with a get and post methods, I will have 2 controllers for this single
endpoint.

## HTTP Requests file

If you do not want to use postman or other tool to check and test this API and you are using PHP Storm,<br>
You can use the requests.http and run any request you want to check.<br>
Above of every request you will find a comment with a basic explanation of the request.

## Router class

The router class will valid that the request is valid and if an endpoint is not found it will return the error
response.<br>
If the route is found and method is allowed it will dispatch the relevant endpoint

## What is env.ini

This file should hold all environment configurations and need to be ignored from git.<br>
Yes, i know that all the platforms using .env file and its cool and fun but i have work to do here and don't have time
to find solutions.<br>
To use env.ini data you can user the next function of php

```php
parse_ini_file($_SERVER['DOCUMENT_ROOT'] . 'env.ini');
```

This will pass all the data from env.ini file parsed to array.<br>
Good luck.