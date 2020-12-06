<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use App\Controllers\Games\Helpers\GamesHelper;

class GetGameByID {
   public function __invoke(ServerRequestInterface $request, string $id) {
      $requestData['statusCode'] = 200;
      $requestData['message'] = GamesHelper::games[$id];
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'],
         ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}