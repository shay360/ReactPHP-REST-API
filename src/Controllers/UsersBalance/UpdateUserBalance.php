<?php

namespace App\Controllers\UsersBalance;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class UpdateUserBalance {
   public function __invoke(ServerRequestInterface $request, int $userID) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse('Update Balance for user: ' . $userID)
      );
   }
}