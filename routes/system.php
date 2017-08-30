<?php

//------------------------角色模块----------------------------

//角色列表（分页）
$app->get('role/search', 'RoleController@getRoles');

//删除角色
$app->delete('role/delete', 'RoleController@deleteRole');

//更新角色
$app->put('role/update','RoleController@changeRole');

//添加角色
$app->post('role/add','RoleController@addRole');

//获取权限分配面板数据
$app->get('role/permissions','PermissionController@getAllPermissionAndModel');

//------------------------菜单模块----------------------------

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

//获取分配权限下拉数据
$app->get('menu/permissions','PermissionController@getAllPermissionAndModel');


//获取权限列表&权限模块
$app->get('permission/all','PermissionController@getAllPermissionAndModel');

//添加权限
$app->post('permission/add','PermissionController@addPermission');

//删除权限
$app->delete('permission/delete','PermissionController@deletePermission');

//更新权限
$app->put('permission/update','PermissionController@changePermission');

//添加权限模块
$app->post('permission/model/add','PermissionController@addPermissionModel');

//删除权限模块
$app->delete('permission/model/delete','PermissionController@deletePermissionModel');

//更新权限模块
$app->put('permission/model/update','PermissionController@changePermissionModel');