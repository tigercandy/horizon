<?php

/**
 * Author: virtual.tang@yingzt.com
 * Date: 31/01/2018
 * Time: 6:55 PM
 */
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
     * 自动加载
     */
    public function _initLoader()
    {
        Yaf\Loader::import(APP_PATH . '/vendor/autoload.php');
    }

    /**
     * 注册插件
     * @param Yaf_Dispatcher $dispatcher
     */
    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
        $user = new UserPlugin();
        $dispatcher->registerPlugin($user);
    }
}