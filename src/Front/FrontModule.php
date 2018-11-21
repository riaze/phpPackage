<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 20/11/2018
 * Time: 15:21
 */

namespace App\Front;
use App\Front\Controller\AboutController;
use App\Front\Controller\ContactController;
use App\Front\Controller\HomeController;
use App\Front\Controller\ProjectShowController;
use Generic\Render\TwigRender;
use Generic\Router\Router;

/**
 * Class FrontModule
 * @package App\Front
 * Le constructeur devra initialiser les routes(addroute)
 *
 */


class FrontModule
{

    public function __construct(Router $router, TwigRender $twigRender){
        //Routage de l'url "/home"

        $router->addRoute('/', new HomeController($twigRender), 'homepage');
        $router->addRoute('/contact', new ContactController($twigRender),'front-contact');
        $router->addRoute('/about', new AboutController($twigRender), 'front-about');
        $router->addRoute('/projet/{id}', new ProjectShowController($twigRender), 'front_project_show');


    }

}

