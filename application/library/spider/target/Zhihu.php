<?php
/**
 * Copyright (c) ${Y} Mantis Right Reserved.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/8
 * Time: 上午9:40
 */

namespace spider\target;

use spider\Target;
use QL\QueryList;

class Zhihu extends Target
{
    private $url = 'https://www.zhihu.com/search?type=content&q=';

    public function crawl($keyword)
    {
        $data = QueryList::Query($this->url . urlencode($keyword), [
            'title' => ['[data-type=Answer] . js-title-link', 'text'],
            'link' => ['[data-type=Answer] . js-title-link', 'href', '', function ($content) {
                return 'https://zhihu.com' . $content;
            }],
            'description' => ['[data-type=Answer] . summary', 'text', '', function ($content) {
                return str_replace('显示全部', $content);
            }]
        ])->getData(function ($item) {
            $now = time();
            list($item['type'], $item['create_time']) = ['zhihu', $now];
            return $item;
        });
        return $data;
    }
}