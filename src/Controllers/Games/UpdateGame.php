<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class UpdateGame {
   public function __invoke(ServerRequestInterface $request, string $id) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse('PUT request /games/' . $id)
      );
   }
}