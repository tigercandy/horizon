<?php

/**
 * Author: tangchunlinit@foxmail.com
 * Date: 31/01/2018
 * Time: 6:55 PM
 */

use Illuminate\Events\Dispatcher as Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

class Bootstrap extends Yaf\Bootstrap_Abstract
{
    private $_config;

    /**
     * 配置
     */
    public function _initConfig()
    {
        $this->_config = Yaf\Application::app()->getConfig();
        Yaf\Registry::set('config', $this->_config);
    }

    /**
     * 路由
     * @param \Yaf\Dispatcher $dispatcher
     */
    public function _initRoute(Yaf\Dispatcher $dispatcher)
    {
        $router = $dispatcher->getRouter();
        $routes = new Yaf\Route\Map(true);
        $router->addRoute('router_map', $routes);
    }

    /**
     * 集成composer自动加载
     */
    public function _initLoader()
    {
        Yaf\Loader::import(APP_PATH . '/vendor/autoload.php');
    }

    /**
     * 注册插件
     * @param Yaf\Dispatcher $dispatcher
     */
    public function _initPlugin(Yaf\Dispatcher $dispatcher)
    {
    }

    /**
     * 视图
     * @param Yaf\Dispatcher $dispatcher
     */
    public function _initView(Yaf\Dispatcher $dispatcher)
    {
        // TODO
    }

    /**
     * init Eloquent
     */
    public function _initCapsule()
    {
        $capsule = new Capsule;
        /*foreach ($this->_config->database->toArray() as $connection => $database) {
            $capsule->addConnection($database, $connection);
        }*/
        $capsule->addConnection($this->_config->database->toArray());
        $capsule->setAsGlobal();
        $capsule->setEventDispatcher(new Dispatcher());
        $capsule->bootEloquent();
    }
}