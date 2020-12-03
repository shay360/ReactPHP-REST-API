<?php

namespace App\Games\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class CreateGame {
   public function __invoke(ServerRequestInterface $request) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => 'Create New Game'])
      );
   }
}