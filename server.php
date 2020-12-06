<?php

use App\Games\Controller\CreateGame;
use App\Games\Controller\DeleteGame;
use App\Games\Controller\GameOptions;
use App\Games\Controller\GetAllGames;
use App\Games\Controller\GetGameByID;
use App\Games\Controller\UpdateGame;
use App\UsersBalance\Controller\GetUserBalance;
use App\UsersBalance\Controller\UpdateUserBalance;
use App\UsersBalance\Controller\UserBalanceOptions;
use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use React\EventLoop\Factory;
use React\Http\Server;
use React\Socket\Server as SocketServer;
use App\Classes\Router;

require 'vendor/autoload.php';

$loop = Factory::create(); // Create a ReactPHP event loop

// Build the Games REST API Routes
$routes = new RouteCollector(new Std(), new GroupCountBased()); // Build a string as FastRout need it
$routes->get('/games', new GetAllGames());
$routes->get('/games/{gameId:\d+}', new GetGameByID());
$routes->post('/games', new CreateGame());
$routes->put('/games/{gameId:\d+}', new UpdateGame());
$routes->delete('/games/{gameId:\d+}', new DeleteGame());
$routes->addRoute('OPTIONS', '/games', new GameOptions()); // If not one of the get, post, put, delete etc... use addRoute and set method
// Build the Games REST API Routes END

// Build the User Balance REST API
$routes->get('/userbalance/{userId:\d+}', new GetUserBalance());
$routes->put('/userbalance/{userId:\d+}', new UpdateUserBalance());

$routes->addRoute('OPTIONS', '/userbalance', new UserBalanceOptions()); // If not one of the get, post, put, delete etc... use addRoute and set method
// Build the User Balance REST API END

$server = new Server($loop, new Router($routes)); // Create new server with routes using the Router class

$socketServer = new SocketServer('127.0.0.1:8000', $loop);
$server->listen($socketServer);
echo 'Listening on: ' . str_replace('tcp', 'http', $socketServer->getAddress()) . PHP_EOL;
$loop->run();