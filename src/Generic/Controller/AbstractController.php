<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 21/11/2018
 * Time: 12:01
 */

namespace Generic\Controller;


use GuzzleHttp\Psr7\Response;
use Psr\Http\Server\MiddlewareInterface;

abstract class AbstractController implements MiddlewareInterface
{
    public function render(string $html )
    {
    $response = new Response
    (
        200,[], $html


    );
    return $response;
    }

}