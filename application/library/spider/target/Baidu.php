<?php
/**
 * Copyright (c) 2018 Mantis Right Reserved.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/8
 * Time: 上午9:28
 */

namespace spider\target;

use spider\Target;
use QL\QueryList;

class Baidu extends Target
{
    private $url = 'https://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=0&rsv_idx=1&tn=baidu&wd=';

    function crawl($keyword)
    {
        $data = QueryList::Query($this->url . $keyword, [
            'title' => ['#content_left . result . t a', 'text'],
            'link' => ['#content_left . result . t a', 'href'],
            'description' => ['#content_left . result . c-abstract', 'text']
        ])->getData(function ($item) {
            $now = time();
            list($item['type'], $item['create_time']) = ['baidu', $now];
            return $item;
        });
        return $data;
    }
}