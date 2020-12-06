<?php

namespace App\Controllers\UsersBalance;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class UpdateUserBalance {
   /**
    * @param ServerRequestInterface $request
    * @param string $provider
    * @param int $userID
    * @return Response
    */
   public function __invoke(ServerRequestInterface $request, string $provider, int $userID) {
      $requestData['statusCode'] = 200;
      $requestData['message'] = 'Update Balance for user: ' . $userID;
      $requestData['success'] = true;
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}