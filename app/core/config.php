<?php


/*APP INFO*/

define("APP_NAME", "Workstreet");
define("APP_DESC", "Listing Job Website Application");
define("APP_VERSION", "1.0");


/*DATABASE CONFIG*/

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	//database config for local server
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "workstreet");
	define("DB_PORT", "3308");

	//root path
	define("ROOT", "http://localhost/workstreet/public");
	define("BASE_ROOT", __DIR__);
} else {
	//database config for live server
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "workstreet");
	define("DB_PORT", "3309");

	//root path
	define("ROOT", "http://192.168.1.136/workstreet/public");
	define("BASE_ROOT", __DIR__);
}
