<?php
/**
 * Copyright 2018 @Mantis.
 * User: tangchunlinit@gmail.com
 * Date: 2018/3/26
 * Time: 上午9:37
 */

use App\Models\User;

class Api_User_InfoController extends Api_BaseController
{
    public function indexAction()
    {
        $user = User::find(1); // find users info where id = 1
        return $this->response($user);
    }
}