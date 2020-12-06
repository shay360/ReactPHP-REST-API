<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class DeleteGame {
   public function __invoke(ServerRequestInterface $request, int $id) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse('DELETE request /games/' . $id)
      );
   }
}