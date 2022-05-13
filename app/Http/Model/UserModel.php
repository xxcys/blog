<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
/*
 * 管理员模型
 */
class UserModel extends Model
{
    protected $table='user';
    protected $primaryKey='id';
    public $timestamps=false;

}
