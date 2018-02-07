<?php
/**
 * Created by PhpStorm.
 * User: tangchunlinit@foxmail.com
 * Date: 2018/2/7
 * Time: 下午11:56
 */

use App\Models\User;

class Api_UserController extends Api_BaseController
{
    public function indexAction()
    {
        $user = User::find(1);
        return $this->response($user);
    }
}