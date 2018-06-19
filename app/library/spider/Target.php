<?php
/**
 * Copyright (c) ${Y} Mantis Right Reserved.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/8
 * Time: 上午9:25
 */

namespace spider;

abstract class Target
{
    private $url;

    abstract function crawl($keyword);
}