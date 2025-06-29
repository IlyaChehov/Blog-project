<?php

namespace Core\Core;

use Core\Database\Database;
use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;

class Application
{
    private Request $request;
    private Response $response;
    private Router $router;
    private View $view;
    private Database $database;
    private static Application $app;
    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View('main');
        $this->database = Database::getInstance();
        $dbConfig = require_once DIR_CONFIG . '/databaseConfig.php';
        $this->database->getConnect($dbConfig);

        Application::$app = $this;
    }

    public static function getApp(): Application
    {
        return self::$app;
    }

    public function run(): void
    {
        $this->router->dispatch();
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function getView(): View
    {
        return $this->view;
    }
}