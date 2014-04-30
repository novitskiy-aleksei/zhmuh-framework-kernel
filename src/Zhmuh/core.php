<?php

/**
 * Main functionality class
 *
 * Class Core
 */
class Core {

    protected $routes = [];

    public function __construct()
    {
        $this->parseRoutes(require_once 'routes.php');
    }

    /**
     * Parse routes from routes.php to associative array
     *
     * @param $routesArray
     */
    private function parseRoutes($routesArray)
    {
        foreach ($routesArray as $path => $route) {
            $r = explode('@', $route);
            $this->routes[$path] = [
                'class' => $r[0],
                'method'=> $r[1]
            ];
        }
    }

    /**
     * Resolve controller/method by route
     *
     * @throws Exception
     */
    private function routeManage()
    {
        $ru = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$ru])){
            $ctrl = $this->routes[$ru]['class'];
            $mtd = $this->routes[$ru]['method'];
            $controller = new $ctrl;
            $controller->$mtd();
        }else{
            throw new \Exception('404 - Route not found');
        }
    }

    /**
     * Database connector
     */
    private function dbConnect()
    {
        try {
            // open connection to MongoDB server
            $connect = new \Mongo();
            // access database
            Db::$db = $connect->{Db::DB_NAME};
        } catch (MongoConnectionException $e) {
            die('Error connecting to MongoDB server');
        } catch (MongoException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    /**
     * Redirect method
     *
     * @param $url
     */
    public static function redirect($url)
    {
        echo '<meta http-equiv="refresh" content="0; url='.$url.'">';
        die();
    }

    public static function e($raw)
    {
        return htmlentities($raw);
    }

    /**
     * Starts application
     */
    public function run()
    {
        $this->dbConnect();
        session_start();
        $this->routeManage();
    }

    /**
     * Called before app death
     */
    public function shutdown()
    {
        // on shutdown
    }
}

return new Core();