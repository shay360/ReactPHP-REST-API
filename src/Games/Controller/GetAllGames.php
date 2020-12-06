<?php

namespace App\Games\Controller;

use App\Games\Helpers\GamesHelper;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GetAllGames {
   public function __invoke(ServerRequestInterface $request) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(GamesHelper::games)
      );
   }
}