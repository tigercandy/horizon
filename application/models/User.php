<?php
/**
 * Author: tangchunlinit@foxmail.com
 * Date: 31/01/2018
 * Time: 7:22 PM
 */

namespace App\Models;

class User extends EloquentModel
{
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password'];
}