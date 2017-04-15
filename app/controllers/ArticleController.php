<?php

class ArticleController extends ControllerBase
{
	public function listAction()
	{
		$currentPage = $this->dispatcher->getParam('page', 'int');
		//if ($currentPage <= 0) $currentPage = 1;

		// Параметры для выборки постов
		$parameter = [ 'order' => 'created_at DESC' ];

		// Выбираем данные
		$articles = Article::find($parameter);

		// Разделяем их на страницы
		$paginator = new \Phalcon\Paginator\Adapter\Model([
			'data' => $articles,
			'limit'=> 10,
			'page' => $currentPage
		]);
		$articles = $paginator->getPaginate();

		// Проверка на наличие cтраницы
		if (!$articles->items)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('articles', $articles);

		// Устанавливаем заголовок
		$this->tag->prependTitle('Статьи');
	}


	public function showAction()
	{
		$slug = $this->dispatcher->getParam('slug');

		// Параметры для выборки постов
		$parameter = [ 'slug = :slug:', 'bind' => [ 'slug' => $slug ]];

		// Выбираем данные
		$article = Article::findFirst($parameter);

		// Проверка на наличие cтраницы
		if (!$article)
			return $this->_notFound();

		// Создаем переменные для шаблона
		$this->view->setVar('article', $article);

		// Меняем заголовок
		$this->tag->prependTitle($article->getName());

		// Ну и метатеги
		if ($article->meta_description)
			$this->tag->setDescription($article->meta_description);
		if ($article->meta_keywords)
			$this->tag->setKeywords($article->meta_keywords);

		// Ну и опенграф
		$ogParameter['type'] = 'website';
		$ogParameter['site_name'] = $this->config->site->title;
		$ogParameter['title'] = $article->getName();
		$ogParameter['description'] = $article->meta_description;
		$ogParameter['image'] = $article->getCover();
		$ogParameter['url'] = $this->config->site->link.$this->url->get([ 'for' => 'article-link', 'slug' => $article->slug ]);
		$this->og->input($ogParameter);
	}

	public function coverAction()
	{
		$slug = $this->dispatcher->getParam('slug');

		// Параметры для выборки постов
		$parameter = [ 'slug = :slug:', 'bind' => [ 'slug' => $slug ]];

		// Выбираем данные
		$article = Article::findFirst($parameter);

		// Проверка на наличие cтраницы
		if (!$article)
			return $this->_notFound();

		$this->view->disable();


		//$im = ImageCreate(800, 420) or die ("Ошибка при создании изображения");
		$im = @imageCreateFromPng('/var/www/yjob.org/public_html/public/assets/cover.png');
		$colorText = ImageColorAllocate($im, 255, 255, 255);
		$string = $article->name;
		$x = 40;
		$y = 200;

		$fontSize = 25;
		$fontFile = '/usr/share/fonts/tahoma.ttf'; // This file must reside on your system
		imageTtfText($im, $fontSize, 0, $x, $y, $colorText, $fontFile, $string);
		imageInterlace($im, 1);
		header("Content-type: image/png");
		imagePng($im);
		imageDestroy($im);
	}
}