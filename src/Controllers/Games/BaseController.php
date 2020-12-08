<?php


namespace App\Controllers\Games;


use React\MySQL\ConnectionInterface;

class BaseController {

   protected static $mysql2;

   public static function init($connection) {
      self::$mysql2 = $connection;
   }

}