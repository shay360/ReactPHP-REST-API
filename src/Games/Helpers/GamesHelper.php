<?php

namespace App\Games\Helpers;

class GamesHelper {

   const games = [
      'game_1',
      'game_2',
      'game_3',
      'game_4'
   ];

   /**
    * Return a stub example for games list in the system
    * @return string[]
    */
   public static function getGames() {
      return self::games;
   }
}