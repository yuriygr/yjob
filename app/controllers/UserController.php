<?php

class UserController extends ControllerBase
{	
	public function listAction()
	{
		$currentPage = $this->request->getQuery('page', 'int');
		//if ($currentPage <= 0) $currentPage = 1;

		// Параметры для выборки постов
		$parameter = [ 'order' => 'points DESC' ];

		// Выбираем данные
		$users = User::find($parameter);

		// Разделяем их на страницы
		$paginator = new \Phalcon\Paginator\Adapter\Model([
			'data' => $users,
			'limit'=> 30,
			'page' => $currentPage
		]);
		$users = $paginator->getPaginate();

		// Проверка на наличие cтраницы
		if (!$users->items)
			return $this->_notFound();
// Поиск
$filter_query = $this->request->getQuery('filter_query');
$filter_location = $this->request->getQuery('filter_location');

		// Создаем переменные для шаблона
		$this->view->setVar('users', $users);
		$this->view->setVar('filter_query', $filter_query);
		$this->view->setVar('filter_location', $filter_location);

		// Меняем заголовок
		$this->tag->prependTitle('Соискатели');
	}
	
	public function registrationAction()
	{	
		if ($this->auth->isLogin())
			return $this->_redirectHome();

		if ($this->request->isPost() && $this->request->isAjax()) {

			// Получаем данные
			$firstname 	= 	$this->request->getPost('firstname', 'striptags');
			$lastname 	= 	$this->request->getPost('lastname', 'striptags');
			$email 		= 	$this->request->getPost('email', 'email');
			$password 	= 	$this->request->getPost('password');

			// Валидируем
			if (!$lastname || !$firstname)
				return $this->_returnJson([ 'error' => 'Введите Имя и Фамилию' ]);

			if (!$email)
				return $this->_returnJson([ 'error' => 'Введите E-Mail' ]);

			if (!$password)
				return $this->_returnJson([ 'error' => 'Введите пароль' ]);

			if (strlen($password) < 6)
				return $this->_returnJson([ 'error' => 'Пароль должен быть длиннее 6 символов' ]);

			if (User::findFirstByEmail($email))
				return $this->_returnJson([ 'error' => 'Такой E-Mail уже используется' ]);

			// Создаём нового
			$user = new User();
			$user->email		=	$email;
			$user->password 	=	$this->security->hash($password);
			$user->firstname	=	$firstname;
			$user->lastname 	= 	$lastname;

			// Проверяем
			if ($user->save()) {

				$this->auth->login($user);
				
				$this->notify->points($user->id, 'Спасибо за регистрацию! За это мы дарим вам <b>30 баллов</b>.');

				$this->flashSession->success('Добро пожаловать, ' . $user->firstname . '!' );

				return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'home-link' ]) ]);
			} else {
				return $this->_returnJson([ 'error' => 'Что-то пошло по пизде' ]);
			}
		}

		/*
		* ШАБЛОН
		*/

		//Меняем заголовок
		$this->tag->prependTitle('Регистрация');
	}

	public function restoreAction()
	{
		if ($this->auth->isLogin())
			return $this->_redirectHome();

		$form = new RestoreUserForm();

		if ($this->request->isPost() && $this->request->isAjax()) {

			if (!$form->isValid($this->request->getPost())) {

				return $this->_returnJson([ 'error' => $form->getMessage() ]);

			} else {

				$email = $this->request->getPost('email');

				// Ищем первого юзера с такими данными
				$user = User::findFirstByEmail($email);
				
				if ($user) {
					$this->flashSession->success('Письмо с паролем отправленно на указанный вами адрес');

					$this->notify->security($user->id, 'Был произведён запрос нового пароля на электронную почту.');

					return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'user-login' ]) ]);
				} else {
					return $this->_returnJson([ 'error' => 'Пользователь с таким E-Mail не зарегестрирован' ]);
				}
			}
		}

		/*
		* ШАБЛОН
		*/

		//Меняем заголовок
		$this->tag->prependTitle('Восстановление пароля');
		$this->view->form = $form;
	}

	public function loginAction()
	{
		if ($this->auth->isLogin())
			return $this->_redirectHome();

		$form = new LoginUserForm();

		if ($this->request->isPost() && $this->request->isAjax()) {

			if (!$form->isValid($this->request->getPost())) {

				return $this->_returnJson([ 'error' => $form->getMessage() ]);

			} else {

				$email 		= $this->request->getPost('email');
				$password 	= $this->request->getPost('password');

				$user = User::findFirstByEmail($email);

				if ($user) {
					
					if ($user->banned)
						return $this->_returnJson([ 'error' => 'Аккаунт заблокирован' ]);

					if ($this->security->checkHash($password, $user->password)) {

						$this->auth->login($user);
						
						$this->flashSession->success('Добро пожаловать, ' . $user->firstname . '!');
						return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'home-link' ]) ]);
					} else {
						return $this->_returnJson([ 'error' => 'Логин или пароль не верен' ]);
					}
				} else {
					return $this->_returnJson([ 'error' => 'Логин или пароль не верен' ]);
				}
			}
		}

		/*
		* ШАБЛОН
		*/

		//Меняем заголовок
		$this->tag->prependTitle('Авторизация');
		$this->view->form = $form;
	}

	public function logoutAction()
	{
		$this->auth->logout();

		$this->flashSession->success('Вы успешно покинули систему');
		return $this->_redirectHome();
	}
	
	public function profileAction()
	{
		$id = $this->dispatcher->getParam('id', 'int');

		// Ищем первого юзера с такими данными
		$user = User::findFirstById($id);

		// Проверка на наличие юзера
		if (!$user)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('user', $user);

		// Меняем заголовок
		$this->tag->prependTitle('Профиль пользователя ' . $user->getFullname());
	}

	public function deleteAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		$form = new DeleteUserForm();

		if ($this->request->isPost() && $this->request->isAjax()) {

			if (!$form->isValid($this->request->getPost())) {

				return $this->_returnJson([ 'error' => $form->getMessage() ]);

			} else {

				$password = $this->request->getPost('password');

				$user = User::findFirstById($id);

				if ($user) {
					if ($this->security->checkHash($password, $user->password)) {

						$this->auth->logout();

						if (!$user->delete())
							return $this->_returnJson([ 'error' => 'Ошибка' ]);

						$this->flashSession->success('Всего доброго');
						return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'home-link' ]) ]);
					} else {
						return $this->_returnJson([ 'error' => 'Пароль не верен' ]);
					}
				} else {
					return $this->_returnJson([ 'error' => 'Пароль не верен' ]);
				}
			}
		}

		/*
		* ШАБЛОН
		*/
		$this->tag->prependTitle('Удаление аккаунта');
		$this->view->form = $form;
	}
}