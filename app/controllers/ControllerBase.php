<?php

class ControllerBase extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		$this->tag->setAutoescape(false);
		$this->tag->setDocType(Phalcon\Tag::HTML5);
		$this->tag->setFavicon($this->config->site->favicon);
		$this->tag->setTitleSeparator(' - ');

		// Записываем метатеги
		$this->tag->setTitle($this->config->site->title);
		$this->tag->setDescription($this->config->site->description);
		$this->tag->setKeywords($this->config->site->keywords);

		// Ну и опенграф
		$ogParameter['type'] = 'website';
		$ogParameter['site_name'] = $this->config->site->title;
		$ogParameter['title'] = $this->config->site->title;
		$ogParameter['description'] = $this->config->site->description;
		$ogParameter['image'] = 'http://yjob.org/assets/apple-touch-icon-180x180.png';
		$ogParameter['url'] = $this->config->site->link;
		$this->og->input($ogParameter);

		// Записываем ассетс
		$this->assets
			 ->addJs('//ajax.googleapis.com/ajax/libs/jquery/' . $this->config->site->jqueryVersion . '/jquery.min.js', false)
			 ->addJs('js/jquery.share.js')
			 ->addJs('js/jquery.ambiance.js')
			 ->addJs('js/main.js');
		$this->assets
			 ->addCss('//fonts.googleapis.com/css?family=' . $this->config->site->font . '&amp;subset=latin,cyrillic-ext', false)
			 ->addCss('//maxcdn.bootstrapcdn.com/font-awesome/' . $this->config->site->faVersion . '/css/font-awesome.min.css', false)
			 ->addCss('css/reset.css')
			 ->addCss('css/style.css');

		// Текущий юзер
		$currentUser = User::findFirstById($this->auth->getId());
		// Футер-коунт
		$countVacancy = '0'; // Vacancy::count();
		$countResume = Resume::count();
		$countUser = User::count();

		$this->view->setVars([
			'currentUser'  => $currentUser,
			'countVacancy' => $countVacancy,
			'countResume'  => $countResume,
			'countUser'    => $countUser
		]);
	}
	
	/*
	 * Ахтунг! Возвращает json контент
	 */
	public function _returnJson($array)
	{
		$this->view->disable();
		$this->response->setContentType('application/json', 'UTF-8');
		$this->response->setJsonContent($array);
		return false;
	}
	public function _notFound()
	{
		$this->response->setStatusCode(404, "Not Found");
		$this->tag->prependTitle("Ошибка 404");
		return $this->view->pick('page/show404');
	}

	public function _redirectHome()
	{
		return $this->response->redirect($this->url->get([ 'for' => 'home-link' ]));
	}
	public function _redirectVacancy()
	{
		return $this->response->redirect($this->url->get([ 'for' => 'vacancy-link' ]));
	}
	public function _redirectLogin()
	{
		return $this->response->redirect($this->url->get([ 'for' => 'user-login' ]));
	}
	public function _redirectNotify()
	{
		return $this->response->redirect($this->url->get([ 'for' => 'notify-home' ]));
	}
}