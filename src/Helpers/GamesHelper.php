<?php

namespace App\Helpers;

class GamesHelper {

   const games = [
      'game_1',
      'game_2',
      'game_3',
      'game_4'
   ];

   public static function getGames() {
      return self::games;
   }
}