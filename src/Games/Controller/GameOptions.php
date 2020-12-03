<?php

namespace App\Games\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GameOptions {
   const OPTIONS = [
      'methods' => [
         'GET' => [
            'description' => 'Will return a list of all games in the system',
            'args' => []
         ],
         'POST' => [
            'description' => 'Will add a new game to the system',
            'args' => [
               'game_name' => [
                  'type' => 'string',
                  'required' => true
               ]
            ]
         ]
      ]
   ];

   public function __invoke(ServerRequestInterface $request) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         json_encode(['message' => self::OPTIONS])
      );
   }
}