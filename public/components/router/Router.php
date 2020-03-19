<?php

namespace router;

use components\router\http\Request;
use exceptions\AuthorizationException;
use components\Authenticate;

class Router
{
    const REGEX = '/\d+/';
    const URI_DELIMITER = '/';
    const WILDCARD = '{id}';
    const CLASS_AND_METHOD_DELIMITER = '@';
    const CONTROLLER_DIR = '\\controller\\';
    const VIEW_ROUTER = 'view';
    /**
     * @var Request
     */
    private $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $route
     * @param string $classAndMethod
     *
     * @return mixed
     */
    public function route($route, $classAndMethod)
    {
        $requestUri = $this->request->getRequestUri();
        $dynamicRoute = preg_match(self::REGEX, $requestUri);
        $arrayUri = explode(self::URI_DELIMITER, $requestUri);
        switch ($dynamicRoute) {
            case true:
                foreach ($arrayUri as $key => $value) {
                    if (is_numeric($value)) {
                        $arrayUri[$key] = self::WILDCARD;
                    }
                }
                $uri = implode(self::URI_DELIMITER, $arrayUri);
                if ($route === $uri) {
                    $classAndMethodArray = explode(self::CLASS_AND_METHOD_DELIMITER, $classAndMethod);
                    $className = self::CONTROLLER_DIR . ucfirst($classAndMethodArray[0]);
                    var_dump($className);
                    $method = $classAndMethodArray[1];
                    $route = new Route($className, $method);
                    $route->execute();
                    die;
                }
                break;
            case false:
                if ($route === $requestUri) {
                    $classAndMethodArray = explode(self::CLASS_AND_METHOD_DELIMITER, $classAndMethod);
                    $className = self::CONTROLLER_DIR . ucfirst($classAndMethodArray[0]);
                    $method = $classAndMethodArray[1];
                    $route = new Route($className, $method);
                    $controller = new $className($this->request);
                    $arrayUri[1] == self::VIEW_ROUTER ?
                        $controller->$method($arrayUri[2]) :
                        $controller->$method();
                    die;
                }
        }
    }
}