<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\Config;//使用Config表构建器

use Illuminate\Support\Facades\Input;//加载input服务

class ConfigController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //get - admin/config  //显示全部配置项
    public function index()
    {
        //获取数据库的配置项信息
        $config =Config::orderBy('conf_order')->get();

        //对所得conf_content数据进行处理

        
        foreach($config as $k=>$v){
            
           switch ($v->field_type) {
               case 'input':
                   $config[$k]->html="<input type='text' name='".$v->conf_id."' class='lg' value='".$v->conf_content."'>";
                   break;
                case 'textarea':
                   $config[$k]->html="<textarea type='text' name='".$v->conf_id."' >".$v->conf_content."</textarea>";
                   break;
                case 'radio':
                   $opt=explode(',',$v->field_value);
                   $str='';
                   foreach ($opt as $key => $value) {
                        $re=explode('|', $value);
                        //判断是否选中
                        $checked=$v->conf_content==$re[0]?'checked':'';
                        $str.="<input type='radio' name='".$v->conf_id."' ".$checked." value='".$re[0]."'>".$re[1]."&nbsp;";
                        
                       
                   }
                   $config[$k]->html=$str;
                   break;
               
               default:
                   # code...
                   break;
           }
        }
        // dd($config);

        //将获得的数据传给前端模板
        return view('admin.config.index')->with('data',$config);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get-  admin/config/create  //显示添加配置项页面
    public function create()
    {
        
        return view('admin.config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //post - admin/config   //执行添加配置项
    public function store(Request $request)
    {
        //获得添加的数据,使用
        $data=Input::except('_token');
        $re=config::create($data);
        if($re)
        {
            return redirect('admin/config')->with('msg','配置项添加成功！');
        }
        else{
            return redirect('admin/config/create')->with('msg','未知错误，配置项添加失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //get - admin/config/{config}  //显示单个文章
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //get - admin/config/{config}/edit  //编辑配置项
    public function edit($id)
    {
        //获得需要修改配置项的信息
        $field=Config::find($id);
        return view('admin.config.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //put -  admin/config/{config}   //更新配置项
    public function update($conf_id)
    {
        //更新修改好的配置项信息
        $input=Input::except('_token','_method');
        $re=config::where('conf_id',$conf_id)->update($input);
        if($re){

            $this->putFile();
            return redirect('admin/config')->with('msg','修改配置项信息成功！');
        }else{
            return redirect('admin/config/'.$conf_id.'/edit')->with('msg','信息未发生变化，修改配置项信息失败！');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //delete - admin/config/{config}   //删除配置项
    public function destroy($id)
    {
        //删除传递过来的配置项
        $re=Config::where('conf_id',$id)->delete();
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功!'
            ];
        }else{
             $data = [
                'status'=>1,
                'msg'=>'删除失败!'
            ];
        }
        $this->putFile();
        return $data;
    }
    //配置项内容更新时
    public function changeContent()
    {
        $input=Input::except('ord','_token');
        // dd($input);
        foreach($input as $k=>$v){
            Config::where('conf_id',$k)->update(['conf_content'=>$v]);
        }
        $this->putFile();
        return back()->with('msg','修改配置成功！');;
    }

    //更新配置项排序
    public function changeOrder(){

        $input=Input::all();

        $conf=Config::find($input['conf_id']);
        $conf->conf_order=$input['conf_order'];
        $re=$conf->update();

        if($re)
        {
            $data=[
                'status'=>0,
                'msg'=>'更新成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'更新失败'
            ];
        }
        return $data;
    }

    //写入配置文件
    public function putFile()
    {
        $data=Config::pluck('conf_content','conf_name')->all();
        $path=base_path().'/config/web.php';

        $config='<?php  return '.var_export($data,true).'; ?>';
        file_put_contents($path, $config);
       
    }
}
