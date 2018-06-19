<?php
/**
 * Author: tangchunlinit@foxmail.com
 * Date: 31/01/2018
 * Time: 2:05 PM
 */

/**
 * --------------------- This is classical startup ---------------------
 */
/*define('APP_PATH', realpath(dirname(__FILE__) . '/../'));
$app = new Yaf\Application(APP_PATH . '/config/app.ini');
$app->bootstrap()->run();*/


/**
 * ---------------------- Use swoole http server startup -----------------------
 */
define('APP_PATH', realpath(dirname(__FILE__) . '/../'));

class HttpServer
{
    private static $_instance;

    public $http;
    public static $get;
    public static $post;
    public static $header;
    public static $server;

    private $app;

    public function __construct()
    {
        $http = new swoole_http_server('127.0.0.1', 9555);

        $http->set([
            'worker_num' => 16,
            'daemonize' => true,
            'max_request' => 1000,
            'dispatch_mode' => 1
        ]);

        $http->on('WorkerStart', [$this, 'onWorkerStart']);

        $http->on('request', function ($request, $response) {
            if (isset($request->server)) {
                HttpServer::$server = $request->server;
            } else {
                HttpServer::$server = [];
            }

            if (isset($request->header)) {
                HttpServer::$header = $request->header;
            } else {
                HttpServer::$header = [];
            }

            if (isset($request->get)) {
                HttpServer::$get = $request->get;
            } else {
                HttpServer::$get = [];
            }

            if (isset($request->post)) {
                HttpServer::$post = $request->post;
            } else {
                HttpServer::$post = [];
            }

            ob_start();

            try {
                $request = new Yaf_Request_Http(HttpServer::$server['request_uri']);
                $this->app->getDispatcher()->dispatch($request);
            } catch (Yaf_Exception $e) {
                throw new Yaf_Exception($e);
            }

            $result = ob_get_contents();
            ob_end_clean();
            $response->end($result);
        });
        $http->start();
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function onWorkerStart()
    {
        $this->app = new Yaf_Application(APP_PATH . '/config/app.ini');
        ob_start();
        $this->app->bootstrap()->run();
        ob_end_clean();
    }

    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}

HttpServer::getInstance();