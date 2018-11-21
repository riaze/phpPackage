<?php

use Generic\App;
use Generic\Middleware\NotFoundMiddleware;
use Generic\Middleware\RouteMiddleware;
use Generic\Middleware\TrailingSlashMiddleware;
use Generic\Router\Router;

require dirname( __DIR__) . '/vendor/autoload.php';

$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

/*$url = $request->getUri()->getPath();


echo '<pre>';
var_dump($url);
echo '</pre>';*/
$router = new Router();

$app = new App(
    [new TrailingSlashMiddleware(),
    new RouteMiddleware($router),
    new NotFoundMiddleware()],
   [ new \App\Front\FrontModule($router)]




);
$reponse = $app->handle($request);


/*var_dump($reponse);
die('hello');*/

\Http\Response\send($reponse);

