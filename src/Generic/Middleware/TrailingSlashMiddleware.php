<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 19/11/2018
 * Time: 16:13
 */

namespace Generic\Middleware;


use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TrailingSlashMiddleware implements  MiddlewareInterface

{

    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Récupérztion de l 'URL
        $url = $request->getUri()->getPath();

        $lastCharacter = substr($url, -1);
        //on test si le dernier caractérs est un slash(/)
        if ($lastCharacter === '/' && $url !=='/') {
            $newURL = substr($url, 0, strlen($url) -1);
            //si oui, on redirige vers l'URL san le slash
            $response = new Response(

                301,
                ["Location" => $newURL]

            );
            return $response;

        }
        else {
            //sinon, on appelle le middlewrae suivant
                return $handler ->handle($request);
        }






    }
}