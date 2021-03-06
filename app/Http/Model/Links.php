<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //设置默认表名
    protected $table='Links';

    //设置默认主键
    protected $primaryKey='link_id';

    //取消时间戳
    public $timestamps=false;

    //设置数据库允许批量赋值
    protected $guarded =[];
}
