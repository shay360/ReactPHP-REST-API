<?php

namespace App\Classes;

class ResponseBuilder {
   private static function buildResponse($message) {
      return ['message' => $message];
   }

   public static function setResponse($message) {
      return json_encode(self::buildResponse($message));
   }
}