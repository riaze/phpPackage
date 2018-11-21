<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 20/11/2018
 * Time: 15:21
 */

namespace App\Front;
use App\Front\Controller\ContactController;
use App\Front\Controller\HomeController;
use Generic\Router\Router;

/**
 * Class FrontModule
 * @package App\Front
 * Le constructeur devra initialiser les routes(addroute)
 *
 */


class FrontModule
{

    public function __construct(Router $router){
        //Routage de l'url "/home"

        $router->addRoute('/', new HomeController());
        $router->addRoute('/contact', new ContactController());


    }

}

