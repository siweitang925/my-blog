<?php

namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //设置默认表名
    protected $table='category';

    //设置默认主键
    protected $primaryKey='cate_id';

    //取消时间戳
    public $timestamps=false;

    //设置数据库允许批量赋值
    protected $guarded =[];
    //获取分类
    //获得树状列表数据
	public function tree()
	{
		$list=$this->orderBy('cate_order')->get();
		return $this->get_tree($list,0,0);
	}

    //获取分类详细信息
    public function get_tree($arr,$p_id=0,$deep=0)
	{
		//利用一个静态局部变量将所有依次找到的元素都保存
		static $tree = array();
		//遍历所有可能分类，找到parent_id==$p_id
		foreach($arr as $row)
		{
			//判断是否为子类

			if($row['cate_pid']==$p_id)
			{
				$row['deep_cate_name']=str_repeat('&nbsp;>&nbsp; ',$deep).$row['cate_name'];
				$tree[]=$row;
				//递归调用
				$this->get_tree($arr,$row['cate_id'],$deep+1);
			}
		}
		return $tree;

	}

}
