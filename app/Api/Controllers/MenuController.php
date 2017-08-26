<?php

/** 
 * @author xiaojian
 * @file MenuController.php
 * @info 系统菜单控制器
 * @date 2017年8月23日 
 */

namespace App\Api\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Api\Contracts\ApiContract;
use App\Api\Models\Menu;

class MenuController extends Controller
{
    private $api;

    private $menu;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ApiContract $api)
    {
        $this->api = $api;
        $this->menu = new Menu();        
    }

    /**
     * @name   获取系统所有菜单（用于菜单设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function getAllMenu()
    {
        //按parentid分组获取数据
        dd($this->menu->groupData());
    } 

}
