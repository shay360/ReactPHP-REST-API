<?php

namespace App\Classes\ProvidersDrivers;

class SpinomenalDriver {

   public static function i() {
      static $i;
      return empty($i) ? new self() : $i;
   }

   /**
    * Used by a dispatcher
    * @param $clientID
    * @return bool
    */
   public function ipIsListed($clientID) {
      return in_array($clientID, ['127.0.0.1', '127.0.0.2']);
   }
}