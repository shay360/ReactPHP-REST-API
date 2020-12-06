<?php

namespace App\Games\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use App\Games\Helpers\GamesHelper;

class GetGameByID {
   public function __invoke(ServerRequestInterface $request, int $id) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => GamesHelper::games[$id]])
      );
   }
}