<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 21/11/2018
 * Time: 13:45
 */

namespace App\Front\Controller;




use Generic\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AboutController extends AbstractController
{
    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: Implement process() method.
        return $this->render('about.twig');

    }

}