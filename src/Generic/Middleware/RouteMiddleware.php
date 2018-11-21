<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 20/11/2018
 * Time: 14:54
 */

namespace Generic\Middleware;


use Generic\Router\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    public function __construct(Router $router )
    {
        $this->router = $router;


    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $route = $this->router->match($request);
        if(!is_null($route)){
            $middleware = $route->getMiddleware();

            return $middleware->process($request,$handler);
        }
        else{
           /* on pass midleware suivant*/
            return $handler->handle($request);
        }

    }


    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     */


}