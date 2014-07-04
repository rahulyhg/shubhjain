<?php

require_once 'location_resolve.php';

session_start();

$GLOBALS['config'] = json_decode(file_get_contents(ROOT . 'core/settings.js'), true);

/*array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db' => 'shubh_jain'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);*/

spl_autoload_register(function($class){
	require_once ROOT . 'classes/' . $class . '.php';
});

/*Load all functions php file*/
require_once ROOT . 'functions/sanitize.php';
require_once ROOT . 'functions/common-markups.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->count()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}
