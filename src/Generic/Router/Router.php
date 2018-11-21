<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 20/11/2018
 * Time: 13:44
 */

namespace Generic\Router;




use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route;

class Router
{
    /**
     * @var FastRouteRouter
     */
    private $externalRouter;
    public function __construct()
    {
        $this->externalRouter = new FastRouteRouter();
    }

    /**
     * Rajouter une string dans la routeur
     * @param string $url
     * @param MiddlewareInterface $middleware
     * @param string $name
     */
    public function addRoute(string $url, MiddlewareInterface $middleware,string $name): void{
        //on créé une route que le routeur externe comprend
        $route = new Route($url,$middleware, ['GET'], $name);

        //on renseigne une nouvelle route dans le routeur extern
        $this->externalRouter->addRoute($route);


    }

    /**
     * @param ServerRequestInterface $request
     */
    public function match(ServerRequestInterface  $request){

        //on demande au routeur externe de comparer l'URL recu les routes qu'il a

       $resultat =  $this->externalRouter->match($request);
       if($resultat->isSuccess()){
           /*var_dump($request->getUri()->getPath());*/

           //on a une route matchée
           return new \Generic\Router\Route(
               $resultat->getMatchedRouteName(),
               $resultat->getMatchedRoute()->getMiddleware(),
               $resultat->getMatchedParams()

               );
       }
       else{

        // on a pas de rout => page 404
            return null;
       }

    }

}