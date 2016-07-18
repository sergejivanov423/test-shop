<?php

namespace ShopApp\Components;
use ShopApp\Exceptions\ContrExeption;

/**
 * Class Router
 * @package ShopApp\Components
 */
class Router
{
    private $routes;

    /**
     * Router constructor.
     * @param $routes
     */
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Parse the address bar(URL):
     * 1. Iterate array of routes and look for key matches in a URL
     * 2. If OK ? Replace of a match and key value
     * 3. Then get an internal route.
     * 4. Convert an internal route string to an array
     * 5. The array elements are our CONTROLLER, ACTION, and PARAMETERS
     * 6. Use Reflection Api and call Controller Action
     *
     */
    public function run()
    {
        // The relative path excluding the host name
        $path = substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],'index.php'));

        // RequestURL excluding the script file[index.php]
        $request = $this->getURL();

        if(SITE_URL === $path) {

            $realRoute = (string) substr($request,strlen(SITE_URL));

            foreach ($this->routes as $urlPattern => $path) {

                if (preg_match("~$urlPattern~", $realRoute)) {

                    $internalRoute = preg_replace("~$urlPattern~", $path, $realRoute);
                    $internalRoute = trim($internalRoute,'/');
                    $parts = explode('/', $internalRoute);

                    $controllerName = 'ShopApp\\Controllers\\' . ucfirst(array_shift($parts)) . 'Controller';
                    $actionName = 'action' . ucfirst(array_shift($parts));
                    $urlParams = $parts;

                    if (class_exists($controllerName)) {

                        $ref = new \ReflectionClass($controllerName);

                        if ($ref->hasMethod($actionName)) {

                            if ($ref->isInstantiable()) {
                                $controller = $ref->newInstance();
                                $action = $ref->getMethod($actionName);
                                $callAction = $action->invokeArgs($controller, $urlParams);
                                break;

                            }
                        }
                    }
                } else {

                    throw new ContrExeption(
                        '<p style="color:red">
                            Неверно заданы маршруты
                            в конфигурационном файле
                        </p>'
                    );
                }
            }
        }
    }

    /**
     * @return string Trimed RequestURI
     */
    private function getURL()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'],"/");
        }
    }
}