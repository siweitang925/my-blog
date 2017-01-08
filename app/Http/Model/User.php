<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置默认表名
    protected $table='user';

    //设置默认主键
    protected $primaryKey='user_id';

    //取消时间戳
    public $timestamps=false;
}
