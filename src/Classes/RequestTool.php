<?php

namespace App\Classes;

use Psr\Http\Message\ServerRequestInterface;

class RequestTool {
   /**
    * Get request body json and return it decoded to php array
    * @param ServerRequestInterface $request
    * @return mixed
    */
   public static function getRequestBody(ServerRequestInterface $request) {
      return json_decode($request->getBody()->getContents());
   }

   /**
    * Will dispatch c provider driver and get the white list ips
    * will check the request ip and make "auth"
    * @param $provider
    */
   public static function isWhiteListedIP($provider) {
      $provider = ucfirst($provider);
      $providerDriver = 'App\Classes\ProvidersDrivers\\' . $provider . 'Driver';
      $clientID = self::getClientID();
      $driver = new $providerDriver();
      return $driver->ipIsListed($clientID);
   }

   public function getClientID() {
      function getUserIP() {
         if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
         }
         $client = @$_SERVER['HTTP_CLIENT_IP'];
         $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
         $remote = $_SERVER['REMOTE_ADDR'];

         if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
         } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
         } else {
            $ip = $remote;
         }
         return $ip;
      }

      $user_ip = getUserIP();
      echo $user_ip;
   }
}