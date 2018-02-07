<?php

/**
 * Created by PhpStorm.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/7
 * Time: 上午9:02
 */

use App\Models\User;

class UserController extends Yaf\Controller_Abstract
{
    public function indexAction()
    {
        $user = User::find(1);
        dd($user->toArray());
    }
}