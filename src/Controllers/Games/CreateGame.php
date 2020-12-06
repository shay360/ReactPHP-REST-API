<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class CreateGame {
   public function __invoke(ServerRequestInterface $request) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse('Create New Game')
      );
   }
}