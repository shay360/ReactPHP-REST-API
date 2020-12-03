<?php

use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Message\Response;
use React\Http\Server;
use React\Socket\Server as SocketServer;

require 'vendor/autoload.php';

$loop = Factory::create();
$server = new Server($loop, function (ServerRequestInterface $request) {
   return new Response(
      200,
      ['Content-Type' => 'application/json'],
      json_encode(['message' => 'REST API response'])
   );
});
$socketServer = new SocketServer('127.0.0.1:8000', $loop);
$server->listen($socketServer);
echo 'Listening on: ' . str_replace('tcp', 'http', $socketServer->getAddress()) . PHP_EOL;
$loop->run();