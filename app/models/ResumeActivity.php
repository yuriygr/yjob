<?php

class ResumeActivity extends ModelBase
{

	public $id;

	public $name;

	public function initialize()
	{
		$this->belongsTo('activity', 'Resume', 'id');
	}
}
