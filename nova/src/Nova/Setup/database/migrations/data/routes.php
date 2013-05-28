<?php

return [
	[
		'name'		=> 'main/index',
		'verb'		=> 'get',
		'uri'		=> '/',
		'resource'	=> 'Nova\Core\Controller\Main@getIndex',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'main/credits',
		'verb'		=> 'get',
		'uri'		=> 'main/credits',
		'resource'	=> 'Nova\Core\Controller\Main@getCredits',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'main/contact',
		'verb'		=> 'get',
		'uri'		=> 'main/contact',
		'resource'	=> 'Nova\Core\Controller\Main@getContact',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'main/contact',
		'verb'		=> 'post',
		'uri'		=> 'main/contact',
		'resource'	=> 'Nova\Core\Controller\Main@postContact',
		'protected'	=> (int) true
	],

	/**
	 * login
	 */
	[
		'name'		=> 'login',
		'verb'		=> 'get',
		'uri'		=> 'login/{error?}',
		'resource'	=> 'Nova\Core\Controller\Login@getIndex',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'login',
		'verb'		=> 'post',
		'uri'		=> 'login/{error?}',
		'resource'	=> 'Nova\Core\Controller\Login@postIndex',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'login/reset',
		'verb'		=> 'get',
		'uri'		=> 'login/reset',
		'resource'	=> 'Nova\Core\Controller\Login@getReset',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'login/reset',
		'verb'		=> 'post',
		'uri'		=> 'login/reset',
		'resource'	=> 'Nova\Core\Controller\Login@postReset',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'login/reset_confirm',
		'verb'		=> 'get',
		'uri'		=> 'login/reset_confirm/{id}/{code}',
		'resource'	=> 'Nova\Core\Controller\Login@getResetConfirm',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'login/reset_confirm',
		'verb'		=> 'post',
		'uri'		=> 'login/reset_confirm/{id}/{code}',
		'resource'	=> 'Nova\Core\Controller\Login@postResetConfirm',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'logout',
		'verb'		=> 'get',
		'uri'		=> 'logout',
		'resource'	=> 'Nova\Core\Controller\Login@getLogout',
		'protected'	=> (int) true
	],

	/**
	 * admin/main
	 */
	[
		'name'		=> 'admin/main/index',
		'verb'		=> 'get',
		'uri'		=> 'admin/main/index',
		'resource'	=> 'Nova\Core\Controller\Admin\Main@getIndex',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'admin/main/error',
		'verb'		=> 'get',
		'uri'		=> 'admin/main/error/{code}',
		'resource'	=> 'Nova\Core\Controller\Admin\Main@getError',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'admin/main/pages',
		'verb'		=> 'get',
		'uri'		=> 'admin/main/pages',
		'resource'	=> 'Nova\Core\Controller\Admin\Main@getPages',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'admin/main/pages',
		'verb'		=> 'post',
		'uri'		=> 'admin/main/pages',
		'resource'	=> 'Nova\Core\Controller\Admin\Main@postPages',
		'protected'	=> (int) true
	],
	
	/**
	 * admin/role
	 */
	[
		'name'		=> 'admin/role',
		'verb'		=> 'get',
		'uri'		=> 'admin/role/{roleID?}',
		'resource'	=> 'Nova\Core\Controller\Admin\Role@getIndex',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'admin/role',
		'verb'		=> 'post',
		'uri'		=> 'admin/role',
		'resource'	=> 'Nova\Core\Controller\Admin\Role@postIndex',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'admin/role/tasks',
		'verb'		=> 'get',
		'uri'		=> 'admin/role/tasks/{taskID?}',
		'resource'	=> 'Nova\Core\Controller\Admin\Role@getTasks',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'admin/role/tasks',
		'verb'		=> 'post',
		'uri'		=> 'admin/role/tasks',
		'resource'	=> 'Nova\Core\Controller\Admin\Role@postTasks',
		'protected'	=> (int) true
	],

	/**
	 * ajax/add
	 */
	[
		'name'		=> 'ajax/add/duplicate_page',
		'verb'		=> 'get',
		'uri'		=> 'ajax/add/duplicate_page/{id}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Add@getPageDuplicate',
		'protected'	=> (int) true
	],

	/**
	 * ajax/get
	 */
	[
		'name'		=> 'ajax/get/position',
		'verb'		=> 'get',
		'uri'		=> 'ajax/get/position/{id}/{return}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@getPosition',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'ajax/get/rank',
		'verb'		=> 'get',
		'uri'		=> 'ajax/get/rank/{id}/{return}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@getRank',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'ajax/get/role_desc',
		'verb'		=> 'get',
		'uri'		=> 'ajax/get/role_desc',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@getRoleDesc',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'ajax/get/role_inherited_tasks',
		'verb'		=> 'post',
		'uri'		=> 'ajax/get/role_inherited_tasks',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@postRoleInheritedTasks',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'ajax/get/roles_with_task',
		'verb'		=> 'post',
		'uri'		=> 'ajax/get/roles_with_task/{id}/{format}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@postRolesWithTask',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'ajax/get/skin_preview',
		'verb'		=> 'get',
		'uri'		=> 'ajax/get/skin_preview/{section}/{location}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@getSkinPreview',
		'protected'	=> (int) true
	],
	[
		'name'		=> 'ajax/get/users_with_role',
		'verb'		=> 'get',
		'uri'		=> 'ajax/get/users_with_role/{id}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Get@getUsersWithRole',
		'protected'	=> (int) true
	],

	/**
	 * ajax/delete
	 */
	[
		'name'		=> 'ajax/delete/system_page',
		'verb'		=> 'get',
		'uri'		=> 'ajax/delete/system_page/{id}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Delete@getSystemPage',
		'protected'	=> (int) true
	],

	/**
	 * ajax/update
	 */
	[
		'name'		=> 'ajax/update/system_page',
		'verb'		=> 'get',
		'uri'		=> 'ajax/update/system_page/{id?}',
		'resource'	=> 'Nova\Core\Controller\Ajax\Update@getSystemPage',
		'protected'	=> (int) true
	],
];