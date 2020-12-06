<?php

namespace App\Classes;

use Psr\Http\Message\ServerRequestInterface;

class RequestTool {

   public static function getRequestBody(ServerRequestInterface $request) {
      return json_decode($request->getBody()->getContents());
   }
}