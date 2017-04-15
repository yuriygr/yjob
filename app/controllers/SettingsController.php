<?php

class SettingsController extends ControllerBase
{	
	public function profileAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		if ($this->request->isPost() && $this->request->isAjax()) {

			// Получаем значения
			$firstname 	= 	$this->request->getPost('firstname', 'striptags');
			$lastname 	= 	$this->request->getPost('lastname', 'striptags');
			$gender 	= 	$this->request->getPost('gender', 'string');
			$location 	= 	$this->request->getPost('location', 'striptags');
			$about 		= 	$this->request->getPost('about', 'striptags');
			$site 		= 	$this->request->getPost('site', 'striptags');

			// Валидируем
			if (!$lastname || !$firstname)
				return $this->_returnJson([ 'error' => 'Введите Имя и Фамилию' ]);

			if (!$gender)
				return $this->_returnJson([ 'error' => 'Выберете пол' ]);

			// Ищем первого юзера с такими данными
			$user = User::findFirstById($id);

			// Задаём значения
			$user->firstname	=	$firstname;
			$user->lastname 	= 	$lastname;
			$user->gender 		= 	$gender;
			$user->location 	= 	$location;
			$user->about 		= 	$about;
			$user->site 		= 	$site;

			// Проверяем
			if ($user->update()) {
				return $this->_returnJson([ 'success' => 'Настройки успешно сохранены' ]);
			} else {
				return $this->_returnJson([ 'error' => 'Что-то пошло по пизде' ]);
			}
		}

		/*
		* ШАБЛОН
		*/
		
		// Ищем первого юзера с такими данными
		$user = User::findFirstById($id);

		// Проверка на наличие юзера
		if (!$user)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('user', $user);
		
		// Меняем заголовок
		$this->tag->prependTitle('Основные настройки');
	}
	
	public function notifyAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		if ($this->request->isPost() && $this->request->isAjax()) {

			// Получаем значения
			$notifyletter 		= 	$this->request->getPost('notifyletter', 'int', 0);
			$newsletter 		= 	$this->request->getPost('newsletter', 'int', 0);
			$recomendedletter 	= 	$this->request->getPost('recomendedletter', 'int', 0);

			// Ищем первого юзера с такими данными
			$user = User::findFirstById($id);

			// Задаём значения
			$user->notifyletter			=	$notifyletter;
			$user->newsletter 			= 	$newsletter;
			$user->recomendedletter 	= 	$recomendedletter;

			// Проверяем
			if ($user->update()) {
				return $this->_returnJson([ 'success' => 'Настройки успешно сохранены' ]);
			} else {
				return $this->_returnJson([ 'error' => 'Что-то пошло по пизде' ]);
			}
		}

		/*
		* ШАБЛОН
		*/

		// Ищем первого юзера с такими данными
		$user = User::findFirstById($id);

		// Проверка на наличие юзера
		if (!$user)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('user', $user);

		// Меняем заголовок
		$this->tag->prependTitle('Почтовая рассылка');
	}

	public function resumeAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		if ($this->request->isPost() && $this->request->isAjax()) {

			/*// Получаем значения
			$notifyletter 		= 	$this->request->getPost('notifyletter', 'int', 0);
			$newsletter 		= 	$this->request->getPost('newsletter', 'int', 0);
			$recomendedletter 	= 	$this->request->getPost('recomendedletter', 'int', 0);

			// Ищем первого юзера с такими данными
			$user = User::findFirstById($id);

			// Задаём значения
			$user->notifyletter			=	$notifyletter;
			$user->newsletter 			= 	$newsletter;
			$user->recomendedletter 	= 	$recomendedletter;

			// Проверяем
			if ($user->update()) {
				return $this->_returnJson([ 'success' => 'Настройки успешно сохранены' ]);
			} else {
				return $this->_returnJson([ 'error' => 'Что-то пошло по пизде' ]);
			}*/
		}

		/*
		* ШАБЛОН
		*/

		// Ищем первого юзера с такими данными
		$user = User::findFirstById($id);

		// Проверка на наличие юзера
		if (!$user)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('user', $user);

		// Меняем заголовок
		$this->tag->prependTitle('Настройка резюме');
	}

	public function passwordAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		if ($this->request->isPost() && $this->request->isAjax()) {

			// Получаем значения
			$password 		= 	$this->request->getPost('password', 'striptags');
			$new_password 	= 	$this->request->getPost('new_password', 'striptags');
			$conf_password 	= 	$this->request->getPost('conf_password', 'striptags');

			// Валидируем
			if (!$password)
				return $this->_returnJson([ 'error' => 'Введите старый пароль' ]);

			if (!$new_password || !$conf_password)
				return $this->_returnJson([ 'error' => 'Введите новый пароль' ]);

			// Ищем первого юзера с такими данными
			$id = $this->auth->getId();
			$user = User::findFirstById($id);

			// Проверяем
			if ($user) {
				if ($this->security->checkHash($password, $user->password)) {

					$user->password = $this->security->hash($new_password);
					
					if ($user->update()) {
						$this->flashSession->success('Пароль успешно изменён' );
						return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'home-link' ]) ]);
					} else {
						return $this->_returnJson([ 'error' => 'Что-то пошло по пизде' ]);
					}
				} else {
					return $this->_returnJson([ 'error' => 'Пароль не верен' ]);
				}
			} else {
				return $this->_returnJson([ 'error' => 'Пароль не верен' ]);
			}
		}

		/*
		* ШАБЛОН
		*/

		// Ищем первого юзера с такими данными
		$user = User::findFirstById($id);

		// Проверка на наличие юзера
		if (!$user)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('user', $user);

		// Меняем заголовок
		$this->tag->prependTitle('Смена пароля');
	}
}