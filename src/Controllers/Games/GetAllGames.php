<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use App\Controllers\Games\Helpers\GamesHelper;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use React\MySQL\Exception;
use React\MySQL\QueryResult;

final class GetAllGames extends BaseController {

   public function __invoke(ServerRequestInterface $request) {
      self::$mysql2->query('show tables')
         ->then(function (QueryResult $result) {
            print_r($result->resultRows);
         },
            function (Exception $error) {
               echo $error->getMessage();
            });
//      ->rejected(function ($res) {
//         print_r($res);
//      });

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