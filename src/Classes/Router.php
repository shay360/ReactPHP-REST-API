<?php

namespace App\Classes;

use FastRoute\Dispatcher\GroupCountBased;
use FastRoute\RouteCollector;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

/**
 * Class Router
 * The router holds all available methods and endpoint of the rest api.
 * When making a new request the router will first check if the request is NOT_FOUNT
 * METHOD_NOT_AVAILABLE or FOUND,
 * If request was not found, relevant message will return, if found, will continue with
 * the request
 * @package App\Classes
 */
final class Router {
   private $dispatcher;

   public function __construct(RouteCollector $routes) {
      $this->dispatcher = new GroupCountBased($routes->getData());
   }

   public function __invoke(ServerRequestInterface $request) {
      $routerInfo = $this->dispatcher->dispatch(
         $request->getMethod(), $request->getUri()->getPath()
      );
      switch ($routerInfo[0]) {
         case \FastRoute\Dispatcher::NOT_FOUND:
            return new Response(404, ['Content-Type' => 'application/json'], json_encode(['message' => 'Not Found']));
         case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            return new Response(405, ['Content-Type' => 'application/json'], json_encode(['message' => 'Method Not Allowed']));
         case \FastRoute\Dispatcher::FOUND:
            $params = array_values($routerInfo[2]);
            return $routerInfo[1]($request, ...$params);
      }
      // Dispatcher END
      throw new LogicException('No Service');
   }
}