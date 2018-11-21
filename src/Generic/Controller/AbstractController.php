<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 21/11/2018
 * Time: 12:01
 */

namespace Generic\Controller;


use Generic\Render\TwigRender;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Server\MiddlewareInterface;

abstract class AbstractController implements MiddlewareInterface
{

    /**
     * @var TwigRenderer
     */
    private $twigRenderer;

    public function __construct(TwigRender $twigRenderer)
     {

         $this->twigRenderer = $twigRenderer;
     }

    public function render(string $pathView )
    {
    $response = new Response
    (
        200,[],
        $this->twigRenderer->render($pathView)


    );
    return $response;
    }

}