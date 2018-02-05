<?php
/**
 * Author: tangchunlinit@foxmail.com
 * Date: 31/01/2018
 * Time: 2:05 PM
 */
define('APP_PATH', dirname(__FILE__));
$app = new Yaf_Application(APP_PATH . '/config/application.ini');
$app->bootstrap()->run();