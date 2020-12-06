<?php

namespace App\Controllers\UsersBalance;

use App\Classes\RequestTool;
use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GetUserBalance {
   /**
    * For this example we can see how i combine a path param (userID) and
    * a decoded body json param $request->getBody()->getContents by using RequestTool class
    * We can use both of them to manipulate data
    * @param ServerRequestInterface $request
    * @param string $provider
    * @param int $userID
    * @return Response
    */
   public function __invoke(ServerRequestInterface $request, string $provider, int $userID) {
      $requestBody = RequestTool::getRequestBody($request); // Get the body json of the request
      $requestData['statusCode'] = 200;
      $requestData['message'] = 'User Balance for user: ' . $userID; // User id taken from path
      $requestData['success'] = true;
      return new Response(
         $requestData['statusCode'], ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse($requestData)
      );
   }
}