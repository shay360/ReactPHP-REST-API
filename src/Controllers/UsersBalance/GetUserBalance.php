<?php

namespace App\Controllers\UsersBalance;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GetUserBalance {
   /**
    * For this example we can see how i combine a path param (userID) and
    * a decoded body json param $request->getBody()->getContents
    * We can use coth of them to manipulate data
    * @param ServerRequestInterface $request
    * @param int $userID
    * @return Response
    */
   public function __invoke(ServerRequestInterface $request, int $userID) {
      $requestBody = json_decode($request->getBody()->getContents()); // Get the body json of the request
      $requestData['statusCode'] = 200;
      $requestData['message'] = 'User Balance for user: ' . $userID; // User id taken from path
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'], ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}