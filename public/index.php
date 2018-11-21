<?php

use Generic\App;
use Generic\Middleware\NotFoundMiddleware;
use Generic\Middleware\RouteMiddleware;
use Generic\Middleware\TrailingSlashMiddleware;
use Generic\Router\Router;

require dirname( __DIR__) . '/vendor/autoload.php';

$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

/**
 *
 */
$router = new \Generic\Router\Router();

$renderer = new \Generic\Render\TwigRender();



$router = new Router();

$app = new App(
    [new TrailingSlashMiddleware(),
    new RouteMiddleware($router),
    new NotFoundMiddleware()],
   [ new \App\Front\FrontModule($router, $renderer)]




);
$reponse = $app->handle($request);


/*var_dump($reponse);
die('hello');*/

\Http\Response\send($reponse);

