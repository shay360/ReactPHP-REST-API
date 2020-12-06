<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use App\Controllers\Games\Helpers\GamesHelper;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GetAllGames {
   public function __invoke(ServerRequestInterface $request) {
      $requestData['statusCode'] = 200;
      $requestData['message'] = GamesHelper::games;
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'],
         ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}