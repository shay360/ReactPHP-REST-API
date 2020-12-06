<?php

namespace App\Classes;
// @TODO Change required data before deploying to production
class Config {

   public static function getEnvSettings() {
      return [
         'isProduction' => false // Change to ttru on production
      ];
   }
}