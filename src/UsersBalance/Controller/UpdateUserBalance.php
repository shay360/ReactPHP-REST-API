<?php

namespace App\UsersBalance\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class UpdateUserBalance {
   public function __invoke(ServerRequestInterface $request, int $userID) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => 'Update Balance for user: ' . $userID])
      );
   }
}