<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 19/11/2018
 * Time: 15:05
 */
namespace Generic;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class App implements RequestHandlerInterface
{
    /**
     * App constructor.
     * @param  MiddlewareInterface[] $middlewares-tableau des middlewares
     *
     */
 private $middlewares;

 private $indexMiddleware = 0;
 public function __construct(array $middlewares, array $modules)
 {
    $this->middlewares = $middlewares;


 }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // TODO: Implement handle() method.


      $middlewares =  $this->middlewares[$this->indexMiddleware];
      $this->indexMiddleware++;
      $response = $middlewares->process($request,$this);
      return $response;


    }
}