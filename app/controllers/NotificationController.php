<?php

class NotificationController extends ControllerBase
{	
	public function listAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();
		
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
		$this->tag->prependTitle('Уведомления');
	}

	public function clearAction()
	{
		if (!$this->auth->isLogin())
			return $this->_redirectLogin();
		$id = $this->auth->getId();

		$this->flashSession->success('А хер тут был' );

		return $this->_redirectNotify();
	}
}