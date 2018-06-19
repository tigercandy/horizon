<?php
/**
 * Copyright (c) 2018. Mantis All Right Reserved.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/7
 * Time: 下午11:38
 */

abstract class Api_BaseController extends Yaf\Controller_Abstract
{
    /**
     * 接口关闭模版渲染
     */
    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
    }

    /**
     * @param $data
     * @return bool
     */
    public function response($data)
    {
        return Response::json($data);
    }
}