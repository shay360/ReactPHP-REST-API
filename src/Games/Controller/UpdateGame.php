<?php

namespace App\Games\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class UpdateGame {
   public function __invoke(ServerRequestInterface $request, int $id) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => 'PUT request /games/' . $id])
      );
   }
}