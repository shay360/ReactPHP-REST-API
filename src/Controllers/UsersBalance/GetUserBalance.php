<?php

namespace App\Controllers\UsersBalance;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GetUserBalance {
   public function __invoke(ServerRequestInterface $request, int $userID) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => 'User Balance for user: ' . $userID])
      );
   }
}