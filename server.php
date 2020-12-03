<?php

use App\Games\Controller\CreateGame;
use App\Games\Controller\GetAllGames;
use FastRoute\RouteCollector;
use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Message\Response;
use React\Http\Server;
use React\Socket\Server as SocketServer;
use function FastRoute\simpleDispatcher;

require 'vendor/autoload.php';

$routerDispatcher = simpleDispatcher(function (RouteCollector $routes) {
   $routes->get('/games', new GetAllGames());
   $routes->post('/games', new CreateGame());
});


$loop = Factory::create();
$server = new Server($loop, function (ServerRequestInterface $request) use ($routerDispatcher) {
   $routerInfo = $routerDispatcher->dispatch(
      $request->getMethod(), $request->getUri()->getPath()
   );
   switch ($routerInfo[0]) {
      case \FastRoute\Dispatcher::NOT_FOUND:
         return new Response(404, ['Content-Type' => 'application/json'], json_encode(['message' => 'Not Found']));
      case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
         return new Response(405, ['Content-Type' => 'application/json'], json_encode(['message' => 'Method Not Allowed']));
      case \FastRoute\Dispatcher::FOUND:
         return $routerInfo[1]($request);
   }

   throw new LogicException('No Service');
});
$socketServer = new SocketServer('127.0.0.1:8000', $loop);
$server->listen($socketServer);
echo 'Listening on: ' . str_replace('tcp', 'http', $socketServer->getAddress()) . PHP_EOL;
$loop->run();