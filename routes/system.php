<?php

//角色列表（分页）
$app->get('/role/search', 'RoleController@getRoles');

//删除角色
$app->delete('/role/delete', 'RoleController@deleteRole');

//获取所有菜单（层级分组）
$app->get('menu/group','MenuController@getAllMenu');

//添加新菜单
$app->post('menu/add','MenuController@addMenu');

//删除菜单
$app->delete('menu/delete','MenuController@deleteMenu');

//更新菜单
$app->put('menu/update','MenuController@updateMenu');

//排序菜单
$app->put('menu/sort','MenuController@sortMenu');

//获取权限列表&权限模块
$app->get('permission/all','PermissionController@getAllPermissionAndModel');

//添加权限
$app->post('permission/add','PermissionController@addNewPermission');

//删除权限
$app->delete('permission/delete','PermissionController@deletePermission');

//删除权限
$app->put('permission/update','PermissionController@changePermission');