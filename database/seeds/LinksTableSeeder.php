<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\DatabaseManager;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data= [
        	[
            'link_name' => '通信汪的博客',
            'link_title' => '非常简洁的hexo博客',
            'link_url' => 'http://tasays.cn/',
            'link_order' => 1,
        ],
        [
            'link_name' => '杨青博客',
            'link_title' => '杨青模板提供者的网站',
            'link_url' =>'http://www.yangqq.com/',
            'link_order' => 2,
        ]
        ];
        DB::table('links')->insert($data);

        

    }
}
