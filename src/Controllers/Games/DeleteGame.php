<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class DeleteGame {
   public function __invoke(ServerRequestInterface $request, string $id) {
      $requestData['statusCode'] = 200;
      $requestData['message'] = 'Create New Game';
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'], ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}