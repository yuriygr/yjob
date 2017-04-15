<?php

class ModelBase extends \Phalcon\Mvc\Model
{
	public function getGenderList()
	{
		return [
			'male' => 'Мужчина',
			'female' => 'Женщина',
			'orher' => 'Другое'
		];
	}
	public function getScheduleList()
	{
		return [
			'1' => 'Вахтовый метод',
			'2' => 'Неполный день',
			'3' => 'Полный день',
			'4' => 'Свободный график',
			'5' => 'Сменный график',
			'6' => 'Удалённая работа'
		];
	}
	public function getExperienceList()
	{
		return [
			'—',
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
			'10',
			'11',
			'12',
			'13',
			'14',
			'15'
		];
	}
}