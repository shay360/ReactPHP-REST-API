<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class CreateGame {
   public function __invoke(ServerRequestInterface $request) {
      $requestData['statusCode'] = 200;
      $requestData['message'] = 'Create New Game';
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'], ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}