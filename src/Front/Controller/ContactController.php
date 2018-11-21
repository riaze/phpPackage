<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 21/11/2018
 * Time: 09:33
 */

namespace App\Front\Controller;

use Generic\Controller\AbstractController;
use GuzzleHttp\Psr7\Response;
use  Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ContactController  extends AbstractController
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: Implement process() method.
        return $this->render('<h1>Bienvenu soir</h1>');

    }

}