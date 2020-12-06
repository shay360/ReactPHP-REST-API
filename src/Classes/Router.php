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
            $requestData['statusCode'] = 404;
            $requestData['message'] = 'Not Found';
            $requestData['success'] = false;
            return new Response($requestData['statusCode'], ['Content-Type' => 'application/json'], ResponseBuilder::setResponse($requestData));
         case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $requestData['statusCode'] = 405;
            $requestData['message'] = 'Method Not Allowed';
            $requestData['success'] = false;
            return new Response($requestData['statusCode'], ['Content-Type' => 'application/json'], ResponseBuilder::setResponse($requestData));
         case \FastRoute\Dispatcher::FOUND:
            $params = array_values($routerInfo[2]);
            return $routerInfo[1]($request, ...$params);
      }
      // Dispatcher END
      throw new LogicException('No Service');
   }
}