<?php

namespace App\Controllers\UsersBalance;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class UserBalanceOptions {
   const OPTIONS = [
      'methods' => [
         'GET' => [
            'description' => 'Will return a single user current balance in site',
            'args' => [
               'user_id' => [
                  'type' => 'int',
                  'required' => true
               ]
            ]
         ],
         'PUT' => [
            'description' => 'Will update a current balance of user in site',
            'args' => [
               'user_id' => [
                  'type' => 'int',
                  'required' => true
               ]
            ]
         ],
      ]
   ];

   public function __invoke(ServerRequestInterface $request) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse(self::OPTIONS)
      );
   }
}