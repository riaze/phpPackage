<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 20/11/2018
 * Time: 14:32
 */

namespace Generic\Router;



use Psr\Http\Server\MiddlewareInterface;

class Route
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var MiddelewareInterface
     */
    private $middeleware;
    /**
     * @var array
     */
    private $params;

    public function __construct(string  $name, MiddlewareInterface $middleware, array $params){

        $this->name = $name;
        $this->middleware = $middleware;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return MiddelewareInterface
     */
    public function getMiddleware(): MiddlewareInterface
    {
        return $this->middleware;
    }

    /**
     * @param MiddelewareInterface $middeleware
     */
    public function setMiddleware(MiddlewareInterface $middleware): void
    {
        $this->middleware = $middleware;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }


}