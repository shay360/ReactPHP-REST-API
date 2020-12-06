<?php

namespace App\Controllers\Games;

use App\Classes\ResponseBuilder;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GameOptions {
   const OPTIONS = [
      'methods' => [
         'GET' => [
            'description' => 'Will return a list of all games in the system',
            'args' => [
               'game_id' => [
                  'type' => 'int',
                  'required' => false
               ]
            ]
         ],
         'POST' => [
            'description' => 'Will add a new game to the system',
            'args' => [
               'game_name' => [
                  'type' => 'string',
                  'required' => true
               ]
            ]
         ],
         'PUT' => [
            'description' => 'Will update game selected by id',
            'args' => [
               'game_id' => [
                  'type' => 'int',
                  'required' => true
               ]
            ]
         ],
         'DELETE' => [
            'description' => 'Will delete game selected by id',
            'args' => [
               'game_id' => [
                  'type' => 'int',
                  'required' => true
               ]
            ]
         ]
      ]
   ];

   public function __invoke(ServerRequestInterface $request) {
      return new Response(
         200, ['Content-Type' => 'application/json'],
         ResponseBuilder::setResponse(self::OPTIONS)
      );
   }
}