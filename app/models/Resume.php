<?php

use \Phalcon\Utils\Timeformat as Timeformat;

class Resume extends ModelBase
{

	public $id;

	public $user_id;

	public $hash;

	public $name;

	public $schedule;

	public $activity;

	public $content;

	public $price;

	public $created_at;

	public $modified_in;

	public function initialize()
	{
		$this->belongsTo('user_id', 'User', 'id');

		$this->hasOne('activity', 'ResumeActivity', 'id');
		$this->hasOne('schedule', 'ResumeSchedule', 'id');

		// Не записываем при редактировании сюда
		$this->skipAttributesOnUpdate(['created_at']);

		// Не записываем при создании сюда
		$this->skipAttributesOnCreate(['modified_in']);
	}
	public function afterFetch()
	{
		// Дата атомного формата
		$this->created_format = Timeformat::atom($this->created_at);

		// Дата в приятном формате
		if ($this->created_at)
			$this->created_at = Timeformat::generate($this->created_at);

		if ($this->modified_in)
			$this->modified_in = Timeformat::generate($this->modified_in);
	}

	public function getDate()
	{
		return '<time datetime="' . $this->created_format . '">' . $this->created_at . '</time>';
	}

	public function getPrice()
	{
		return '' . $this->price . ' руб.';
	}
}
