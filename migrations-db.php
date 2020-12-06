<?php

use App\Classes\Config;

return [
   'dbname' => getenv('DB_NAME'),
   'user' => getenv('DB_USER'),
   'password' => getenv('DB_PASS'),
   'host' => getenv('DB_HOST'),
   'driver' => getenv('DB_DRIVER')
];