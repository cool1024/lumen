<?php

//角色列表（分页）
$app->get('/role/search', 'RoleController@getRoles');

//删除角色
$app->delete('/role/delete', 'RoleController@deleteRole');
