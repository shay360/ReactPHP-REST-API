<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class UpdateGame {
   public function __invoke(ServerRequestInterface $request, string $id) {
      $requestData['statusCode'] = 200;
      $requestData['message'] = 'Game: ' . $id . ' Updated!';
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'], ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}