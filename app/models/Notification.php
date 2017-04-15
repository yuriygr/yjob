<?php

use \Phalcon\Utils\Timeformat as Timeformat;

class Notification extends ModelBase
{

	public $id;

	public $user_id;

	public $type;

	public $text;

	public $created_at;

	public $is_read;

	public function initialize()
	{
		$this->belongsTo('user_id', 'User', 'id');
	}

	// После того как выбрали данные из базы
	public function afterFetch()
	{	
		// Дата атомного формата
		$this->created_format = Timeformat::atom($this->created_at);

		// Дата в приятном формате
		if ($this->created_at)
			$this->created_at = Timeformat::generate($this->created_at);
	}

	public function getType()
	{
		switch ($this->type) {
			case 'normal':
				$type = 'Уведомление';
				break;
			case 'points':
				$type = 'Баллы';
				break;
			case 'security':
				$type = 'Безопасность';
				break;
			default:
				$type = 'Уведомление';
				break;
		}
		return $type;
	}

	public function getDate()
	{
		return '<time datetime="' . $this->created_format . '">' . $this->created_at . '</time>';
	}
}
