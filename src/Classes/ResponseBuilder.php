<?php

namespace App\Classes;

class ResponseBuilder {
   private static function buildResponse($responseSettings) {
      return [
         'message' => $responseSettings['message'],
         'success' => $responseSettings['success'],
         'status_code' => $responseSettings['statusCode']
      ];
   }

   public static function setResponse($responseSettings) {
      return json_encode(self::buildResponse($responseSettings));
   }
}