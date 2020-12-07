<?php

namespace App\Classes;

class SystemTools {

   /**
    * Will return (parsed) the env.ini file of the system with the configuration of this system,
    * @return array|false
    */
   public static function getSystemEnv() {
      return parse_ini_file($_SERVER['DOCUMENT_ROOT'] . 'env.ini');
   }
}