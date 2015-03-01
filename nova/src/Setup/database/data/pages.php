<?php

return [
	[
		'verb'				=> "GET",
		'name'				=> "Welcome Page",
		'key'				=> "home",
		'uri'				=> "/",
		'default_resource'	=> "Nova\\Foundation\\Http\\Controllers\\MainController@page",
		'protected'			=> (int) true,
	],

	[
		'verb'				=> "GET",
		'name'				=> "Log In",
		'key'				=> "login",
		'uri'				=> "login",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\AuthController@getLogin",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "POST",
		'name'				=> "",
		'key'				=> "login.do",
		'uri'				=> "login",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\AuthController@postLogin",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "GET",
		'name'				=> "Logout",
		'key'				=> "logout",
		'uri'				=> "logout",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\AuthController@getLogout",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "GET",
		'name'				=> "Send Password Reminder",
		'key'				=> "password.email",
		'uri'				=> "password",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\PasswordController@getEmail",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "POST",
		'name'				=> "",
		'key'				=> "password.email.send",
		'uri'				=> "password",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\PasswordController@postEmail",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "GET",
		'name'				=> "Reset Password",
		'key'				=> "password.reset",
		'uri'				=> "password/reset/{token}",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\PasswordController@getReset",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "POST",
		'name'				=> "",
		'key'				=> "password.reset.do",
		'uri'				=> "password/reset",
		'default_resource'	=> "Nova\\Core\\Auth\\Http\\Controllers\\PasswordController@postReset",
		'protected'			=> (int) true,
	],

	[
		'verb'				=> "GET",
		'name'				=> "Page Manager",
		'key'				=> "admin.pages",
		'uri'				=> "admin/pages",
		'default_resource'	=> "Nova\\Core\\Pages\\Http\\Controllers\\PageController@index",
		'protected'			=> (int) true,
	],
	[
		'verb'				=> "GET",
		'name'				=> "Edit Page",
		'key'				=> "admin.pages.edit",
		'uri'				=> "admin/pages/{pageId}/edit",
		'default_resource'	=> "Nova\\Core\\Pages\\Http\\Controllers\\PageController@edit",
		'protected'			=> (int) true,
	],
];
