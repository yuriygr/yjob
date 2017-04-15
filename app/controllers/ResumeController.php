<?php

class ResumeController extends ControllerBase
{	
	public function listAction()
	{
		$currentPage = $this->request->getQuery('page', 'int');
		//if ($currentPage <= 0) $currentPage = 1;

		// Параметры для выборки постов
		$parameter = [ 'order' => 'created_at DESC' ];

		// Выбираем данные
		$resumes = Resume::find($parameter);

		// Разделяем их на страницы
		$paginator = new \Phalcon\Paginator\Adapter\Model([
			'data' => $resumes,
			'limit'=> 30,
			'page' => $currentPage
		]);
		$resumes = $paginator->getPaginate();

		// Проверка на наличие cтраницы
		if (!$resumes->items)
			return $this->_notFound();

// Поиск
$filter_query = $this->request->getQuery('filter_query');
$filter_activity = $this->request->getQuery('filter_activity');
$filter_schedule = $this->request->getQuery('filter_schedule');
$filter_experience = $this->request->getQuery('filter_experience');
$filter_location = $this->request->getQuery('filter_location');



		// Создаем переменные для шаблона
		$this->view->setVar('resumes', $resumes);

		$this->view->setVar('filter_exemple', 'Почесывальщик котеек');
		$this->view->setVar('filter_query', $filter_query);
		$this->view->setVar('filter_activity', $filter_activity);
		$this->view->setVar('filter_schedule', $filter_schedule);
		$this->view->setVar('filter_experience', $filter_experience);
		$this->view->setVar('filter_location', $filter_location);

		// Устанавливаем заголовок
		$this->tag->prependTitle('Резюме');
	}

	public function showAction()
	{
		$hash = $this->dispatcher->getParam('hash');

		// Ищем первое резюме с такими данными
		$resume = Resume::findFirstByHash($hash);

		// Проверка на наличие резюме
		if (!$resume)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('resume', $resume);

		// Меняем заголовок
		$this->tag->prependTitle($resume->name . ' ' . $resume->getPrice());

		// Ну и метатеги
		if ($resume->description)
			$this->tag->setDescription($resume->name . ' ' . $resume->getPrice());

		// Ну и опенграф
		$ogParameter['type'] = 'website';
		$ogParameter['site_name'] = $this->config->site->title;
		$ogParameter['title'] = $resume->name . ' ' . $resume->getPrice();
		$ogParameter['description'] = $resume->name . ' ' . $resume->getPrice();
		$ogParameter['url'] = $this->config->site->link.$this->url->get([ 'for' => 'resume-link', 'hash' => $resume->hash ]);
		$this->og->input($ogParameter);
	}

	public function createAction() {
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		if ($this->request->isPost() && $this->request->isAjax()) {

			$random = new \Phalcon\Security\Random();

			// Получаем данные
			$hash 			= 	$random->hex(10);
			$name 			= 	$this->request->getPost('name', 'striptags');
			$schedule 		= 	$this->request->getPost('schedule', 'striptags');
			$activity 		= 	$this->request->getPost('activity', 'striptags');
			$content 		= 	$this->request->getPost('content', 'striptags');
			$price 			= 	$this->request->getPost('price', 'int');

			// Валидируем
			if (!$name || strlen($name) < 6)
				return $this->_returnJson([ 'error' => 'Введите название резюме' ]);
			
			if (!$schedule)
				return $this->_returnJson([ 'error' => 'Введите schedule' ]);
			
			if (!$activity)
				return $this->_returnJson([ 'error' => 'Введите activity' ]);

			if (!$content || strlen($content) < 10)
				return $this->_returnJson([ 'error' => 'Введите основное содержание' ]);

			if (!$price)
				return $this->_returnJson([ 'error' => 'Введите желаемую зарплату' ]);

			// Создаём новое резюме
			$resume = new Resume();
			$resume->user_id 		=	$id;
			$resume->hash			=	$hash;
			$resume->name			=	$name;
			$resume->schedule 		= 	$schedule;
			$resume->activity 		= 	$activity;
			$resume->content 		= 	$content;
			$resume->price 			= 	$price;
			$resume->created_at 	= 	time();

			// Проверяем
			if ($resume->save()) {

				$this->flashSession->success('Резюме создано!');

				return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'resume-link', 'hash' => $resume->hash  ]) ]);
			} else {
				foreach ($resume->getMessages() as $message) $error_mess = $message. " ";
				return $this->_returnJson([ 'error' => 'Что-то пошло по пизде ' . $error_mess ]);
			}
		}

		/*
		* ШАБЛОН
		*/
		
		// Ищем первого юзера с такими данными
		$user = User::findFirstById($id);
		// Список сфер деятельности
		$resume_activity = ResumeActivity::find();
		// Список график работы
		$resume_schedule = ResumeSchedule::find();


		// Проверка на наличие юзера
		if (!$user)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('user', $user);
		$this->view->setVar('resume_activity', $resume_activity);
		$this->view->setVar('resume_schedule', $resume_schedule);
		
		// Меняем заголовок
		$this->tag->prependTitle('Создание резюме');		
	}

	public function deleteAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		$hash = $this->dispatcher->getParam('hash');

		if ($this->request->isPost() && $this->request->isAjax()) {

			$delete_confirm 	= 	$this->request->getPost('delete_confirm', 'string');

			if (!$delete_confirm || $delete_confirm != 'Удалить')
				return $this->_returnJson([ 'error' => 'Подтвердите удаление' ]);

			// Ищем первое резюме с такими данными
			$resume = Resume::findFirstByHash($hash);

			// Проверяем
			if ($resume) {
				if ($resume->user_id == $id) {

					if (!$resume->delete())
						return $this->_returnJson([ 'error' => 'Ошибка удаления' ]);

					$this->flashSession->success('Ваше резюме успешно удалено');
					return $this->_returnJson([ 'redirect' => $this->url->get([ 'for' => 'user-profile', 'id' => $id ]) ]);
				} else {
					return $this->_returnJson([ 'error' => 'Резюме не найдено' ]);
				}
			} else {
				return $this->_returnJson([ 'error' => 'Резюме не найдено' ]);
			}
		}

		/*
		* ШАБЛОН
		*/

		// Ищем первое резюме с такими данными
		$resume = Resume::findFirstByHash($hash);

		// Проверка на наличие резюме
		if (!$resume)
			return $this->_notFound();
		
		if ($resume->user_id != $id)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('resume', $resume);
		
		// Меняем заголовок
		$this->tag->prependTitle($resume->name . ' - Удаление резюме');		
	}
}