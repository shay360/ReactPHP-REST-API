<?php

use App\Controllers\Games\CreateGame;
use App\Controllers\Games\DeleteGame;
use App\Controllers\Games\GameOptions;
use App\Controllers\Games\GetAllGames;
use App\Controllers\Games\GetGameByID;
use App\Controllers\Games\UpdateGame;
use App\Controllers\UsersBalance\GetUserBalance;
use App\Controllers\UsersBalance\UpdateUserBalance;
use App\Controllers\UsersBalance\UserBalanceOptions;
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
$routes->get('/1.0/games', new GetAllGames());
$routes->get('/1.0/games/{gameId}', new GetGameByID());
$routes->post('/1.0/games', new CreateGame());
$routes->put('/1.0/games/{gameId}', new UpdateGame());
$routes->delete('/1.0/games/{gameId}', new DeleteGame());
$routes->addRoute('OPTIONS', '/1.0/games', new GameOptions()); // If not one of the get, post, put, delete etc... use addRoute and set method
// Build the Games REST API Routes END

// Build the User Balance REST API
$routes->get('/1.0/userbalance/{userId:\d+}', new GetUserBalance());
$routes->put('/1.0/userbalance/{userId:\d+}', new UpdateUserBalance());
$routes->addRoute('OPTIONS', '/1.0/userbalance', new UserBalanceOptions()); // If not one of the get, post, put, delete etc... use addRoute and set method
// Build the User Balance REST API END

$server = new Server($loop, new Router($routes)); // Create new server with routes using the Router class

$socketServer = new SocketServer('127.0.0.1:8000', $loop);
$server->listen($socketServer);

$server->on('error', function (Throwable $error) { // Set an error message
   echo 'Error: ' . $error->getMessage() . PHP_EOL;
});

echo 'Listening on: ' . str_replace('tcp', 'http', $socketServer->getAddress()) . PHP_EOL;
$loop->run();