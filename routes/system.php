<?php

//角色列表（分页）
$app->get('/role/search', 'RoleController@getRoles');

//删除角色
$app->delete('/role/delete', 'RoleController@deleteRole');

//获取所有菜单（层级分组）
$app->get('menu/group','MenuController@getAllMenu');

//add new menu
$app->post('menu/add','MenuController@addMenu');

//delete menu
$app->delete('menu/delete','MenuController@deleteMenu');

//update menu
$app->put('menu/update','MenuController@updateMenu');

//sort menu
$app->put('menu/sort','MenuController@sortMenu');