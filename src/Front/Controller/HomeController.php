<?php

namespace App\Front\Controller;
use Generic\Controller\AbstractController;
use GuzzleHttp\Psr7\Response;
use  Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;



/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 20/11/2018
 * Time: 11:19
 */

class HomeController extends AbstractController
{


    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: Implement process() method.
        return $this->render('<h1>Bienvenu home</h1>');

        }


}