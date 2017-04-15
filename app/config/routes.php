<?php
/*
	Home
	==================================================================================
*/
$router->add('/', 					'Page::index' 			)->setName('home-link');

/*
	User
	==================================================================================
*/
# Список пользователей
$router->add('/user', 				'User::list' 			)->setName('user-home');
# Регистрация
$router->add('/user/registration', 	'User::registration' 	)->setName('user-registration');
# Восстановление пароля
$router->add('/user/restore', 		'User::restore' 		)->setName('user-restore');
# Вход
$router->add('/user/login', 		'User::login' 			)->setName('user-login');
# Выход
$router->add('/user/logout', 		'User::logout' 			)->setName('user-logout');
# Профиль
$router->add('/user/u{id}', 		'User::profile' 		)->setName('user-profile');
# Удаление аккаунта
$router->add('/user/delete', 		'User::delete' 			)->setName('user-delete');
# Получение очков
$router->add('/user/points', 		'User::points' 			)->setName('user-points');

/*
	Notification
	==================================================================================
*/
# Список уведомлений
$router->add('/notify', 			'Notification::list' 	)->setName('notify-home');
$router->add('/notify/clear', 		'Notification::clear' 	)->setName('notify-clear');

/*
	Settings
	==================================================================================
*/
# Общие настройки
$router->add('/settings/profile', 	'Settings::profile' 	)->setName('settings-profile');
# Почтовая рассылка
$router->add('/settings/notify', 	'Settings::notify' 		)->setName('settings-notify');
# Настройка резюме
$router->add('/settings/resume',	'Settings::resume' 		)->setName('settings-resume');
# Изменить пароль
$router->add('/settings/password',	'Settings::password' 	)->setName('settings-password');

/*
	Resume
	==================================================================================
*/
$router->add('/resume', 					'Resume::list' 			)->setName('resume-home');
# Просмотр
$router->add('/resume/{hash}', 				'Resume::show' 			)->setName('resume-link');
# Редактирование
$router->add('/resume/{hash}/edit', 		'Resume::edit' 			)->setName('resume-edit');
# Удаление
$router->add('/resume/{hash}/delete', 		'Resume::delete' 		)->setName('resume-delete');
# Добавление
$router->add('/resume/create', 				'Resume::create' 		)->setName('resume-create');



/*
	Vacancy TODO
	==================================================================================
*/
$router->add('/vacancy', 'Vacancy::index' )->setName('vacancy-home');
$router->add('/vacancy/{id}', 'Vacancy::show' )->setName('vacancy-link');
# Добавление
$router->add('/vacancy/create', 				'Vacancy::create' 		)->setName('vacancy-create');


/*
	Company TODO
	==================================================================================
*/
$router->add('/company', 'Company::index' )->setName('company-home');
$router->add('/company/{id}', 'Company::show' )->setName('company-link');

/*
	Article
	==================================================================================
*/
$router->add('/article', 					'Article::list' 		)->setName('article-home');
$router->add('/article/page/{page}', 		'Article::list' 		)->setName('article-page');
$router->add('/article/{slug}', 			'Article::show' 		)->setName('article-link');
$router->add('/article/{slug}.png', 		'Article::cover' 		)->setName('article-cover');

/*
	Page
	==================================================================================
*/
$router->add('/page', 						'Page::index' 			)->setName('page-home');
$router->add('/page/{slug}', 				'Page::show' 			)->setName('page-link');

/*
	404 page
	==================================================================================
*/
$router->notFound( 'Page::show404' );