<?php
use Phalcon\Config;
use Phalcon\Logger;

$config =  new Config([
	'site' => [
		'favicon'			=> '/assets/favicon.ico',
		'title'				=> 'yJob',
		'description'		=> 'Поиск работы, бесплатно. Обширная база резюме и вакансий со всех уголков России без необходимости платить за отклик на вакансию и размещение резюме.',
		'keywords'			=> 'Работа, поиск, бесплатно, найти работу, найти сотрудника, объявления, россия, отклик, база, найти',
		'link'				=> 'http://yjob.org',

		'jqueryVersion'		=> '2.2.2',
		'faVersion' 		=> '4.6.1',
		'font' 				=> 'Open+Sans:600,400,300',
	],
	'social' => [
		'vk'				=> 'yjobs',
		'odnoklassniki'		=> 'yjobs',
		'facebook'			=> 'yjob.org',
		'telegram'			=> 'YJobBot',
		'youtube'			=> 'UC0JuiFmYigifDZntCQiNgGg',
		'twitter'			=> 'yjob_org',
	],	
	'database' => [
		'adapter'			=> 'Mysql',
		'host'				=> 'localhost',
		'username'			=> '',
		'password'			=> '',
		'name'				=> '',
		'charset'			=> 'utf8',
	],
	'redis' => [
		'host'				=> '127.0.0.1',
		'port'				=> 6379,
		'lifetime'			=> 129600,
	],
	'application' => [
		'controllersDir'	=> APP_DIR . '/controllers/',
		'modelsDir'			=> APP_DIR . '/models/',
		'viewsDir'			=> APP_DIR . '/views/',
		'libraryDir'		=> APP_DIR . '/library/',
		'pluginsDir'		=> APP_DIR . '/plugins/',
		'formsDir'			=> APP_DIR . '/forms/',
		'cacheDir'			=> APP_DIR . '/../cache/',
		'baseUri'			=> '/',
		'cryptSalt'			=> 'eEA_&G&f,+v]:A&+71My|:+.u>/6m,$D',
	],
    'logger' => [
        'path'				=> APP_DIR . '/../../logs/',
        'format'			=> '%date% [%type%] %message%',
        'date'				=> 'D j H:i:s',
        'logLevel' 			=> Logger::DEBUG,
        'filename' 			=> 'application.log',
    ],
    'smsc' => [
        'login'				=> '',
        'password'			=> '',
        'sender'			=> 'yjob_org',
        'fmt' 				=> '1',
        'charset' 			=> 'utf-8',
    ],
]);
