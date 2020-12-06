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
}