<?php

return [
	[
		'key' => 'sim_name',
		'value' => '',
		'user_created' => (int) false,
		'show_basic_settings' => (int) true
	],
	[
		'key' => 'sim_year',
		'value' => '',
		'user_created' => (int) false,
		'show_basic_settings' => (int) true
	],
	[
		'key' => 'maintenance',
		'value' => 'off',
		'help' => "Maintenance mode allows only admins to log in to the system while updates are being applied or other work is being done",
		'user_created' => (int) false
	],
	[
		'key' => 'skin_main',
		'value' => 'default',
		'user_created' => (int) false,
		'show_basic_settings' => (int) true
	],
	[
		'key' => 'skin_admin',
		'value' => 'default',
		'user_created' => (int) false,
		'show_basic_settings' => (int) true
	],
	[
		'key' => 'skin_login',
		'value' => 'default',
		'user_created' => (int) false,
		'show_basic_settings' => (int) true
	],
	[
		'key' => 'rank',
		'value' => 'default',
		'user_created' => (int) false,
		'show_basic_settings' => (int) true
	],
	[
		'key' => 'email_status',
		'value' => Status::ACTIVE,
		'user_created' => (int) false
	],
	[
		'key' => 'email_subject',
		'value' => '',
		'help' => "You can set the email subject prefix for every email that comes from the system. The default is your sim name inside brackets.",
		'user_created' => (int) false
	],
	[
		'key' => 'email_name',
		'value' => 'Nova',
		'user_created' => (int) false
	],
	[
		'key' => 'email_address',
		'value' => 'me@example.com',
		'help' => "To avoid some email services marking emails from Nova as spam, use this email address to set a specific address. This defaults to an address that should prevent this issue.",
		'user_created' => (int) false
	],
	[
		'key' => 'timezone',
		'value' => 'UTC',
		'user_created' => (int) false
	],
	[
		'key' => 'date_format',
		'value' => 'd M Y',
		'user_created' => (int) false
	],
	[
		'key' => 'updates',
		'value' => '4',
		'user_created' => (int) false
	],
	[
		'key' => 'post_count_format',
		'value' => 'multiple',
		'help' => "Posts can be counted in two ways: one post no matter how many authors (single) or a post for each author (multiple)",
		'user_created' => (int) false
	],
	[
		'key' => 'use_mission_notes',
		'value' => 'y',
		'user_created' => (int) false
	],
	[
		'key' => 'online_timespan',
		'value' => '5',
		'help' => "This is used for the Who's Online feature and should be set in minutes. The higher the number, the less accurate the data, but the lower impact it'll have on the server.",
		'user_created' => (int) false
	],
	[
		'key' => 'posting_requirement',
		'value' => 14,
		'help' => "The timespan (in days) that a player must post within. Set this to 0 to remove the requirement.",
		'user_created' => (int) false
	],
	[
		'key' => 'login_attempts',
		'value' => 5,
		'help' => "The number of times a user can attempt to log in before being locked out. This feature exists to help protect sites against brute-force attacks.",
		'user_created' => (int) false
	],
	[
		'key' => 'login_lockout_time',
		'value' => 15,
		'help' => "When a user is locked out because of too many log in attempts, this is the number of minutes they need to wait before logging in again. This goes hand-in-hand with the lockout system to protect against brute-force atatcks.",
		'user_created' => (int) false
	],
	[
		'key' => 'meta_description',
		'value' => "Anodyne Productions' premier online RPG management software",
		'user_created' => (int) false
	],
	[
		'key' => 'meta_keywords',
		'value' => "nova, rpg management, anodyne, rpg, sms",
		'user_created' => (int) false
	],
	[
		'key' => 'meta_author',
		'value' => "Anodyne Productions",
		'user_created' => (int) false
	],
];