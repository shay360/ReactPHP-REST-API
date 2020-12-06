<?php

namespace App\Controllers\Games\Helpers;

class GamesHelper {

   const games = [
      'game_1' => [
         'name' => 'The game of Shay'
      ],
      'game_2' => [
         'name' => 'The game of Serjo'
      ],
      'game_3' => [
         'name' => 'The game of Eli'
      ],
      'game_4' => [
         'name' => 'The game of Eden'
      ]
   ];

   /**
    * Return a stub example for games list in the system
    * @return string[]
    */
   public static function getGames() {
      return self::games;
   }
}