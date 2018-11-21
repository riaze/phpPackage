<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 21/11/2018
 * Time: 14:11
 */

namespace Generic\Render;


use Twig_Environment;
use Twig_Loader_Filesystem;

class TwigRender
{
    /**
     * @var
     */
    private $twig;
    /**
     * TwigRender constructor.
     */
public function __construct()
{
    $loader = new Twig_Loader_Filesystem(dirname(dirname(dirname(__DIR__))).'/templates');
    $this->twig = new Twig_Environment($loader);

}

public function addPath(string $path, string $namespace):void{
    /**
     * @var Twig_Loader_Filesystem
     */
    $loader= $this->twig->getLoader();
    $loader->addPath($path, $namespace);
}

    /**
     *
     * @param string $view
     * @param array|null $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
public function render(string $view, ?array $params =[]):string{
       return  $this->twig->render($view,$params);
}

public function addGlobal(string $name, $value): void
{

    $this->twig->addGlobal($name, $value);
}

}