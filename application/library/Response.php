<?php
/**
 * Copyright (c) 2018. Mantis All Right Reserved.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/7
 * Time: 下午11:44
 *
 * 接口响应
 */

class Response
{
    public static function json($data)
    {
        $response = new Yaf\Response\Http();

        $response->setHeader('Content-Type', 'application/json; charset=utf-8');
        $response->setBody(json_encode($data));
        return $response->response();
    }
}