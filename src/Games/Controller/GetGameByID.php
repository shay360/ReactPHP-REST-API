<?php

namespace App\Games\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use App\Helpers\GamesHelper;

class GetGameByID {
   public function __invoke(ServerRequestInterface $request, int $id) {
      $games = GamesHelper::games;
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => $games[$id]])
      );
   }
}