<?php

class User extends ModelBase
{

	public $id;

	public $email;

	public $password;

	public $firstname;

	public $lastname;

	public $gender;

	public $location;

	public $about;

	public $age;

	public $points;

	public $verify;

	public $banned;
	
	public $site;

	private $photo;

	/* Уведомления */
	public $notifyletter;
	public $newsletter;
	public $recomendedletter;


	public function initialize()
	{
		$this->hasMany('id', 'Notification', 'user_id');
		$this->hasMany('id', 'Resume', 'user_id');

	}
	
	public function afterFetch()
	{
		$this->photo = false;
		$this->age = '21';
	}

	public function getFullname()
	{
		return $this->firstname . ' ' . $this->lastname;
	}

	/* Возрас */
	public function getAge()
	{
		return $this->age . ' год';
	}

	/* Фото */
	public function getPhoto()
	{
		return $this->photo ? $this->photo : 'https://www.gravatar.com/avatar/'.md5($this->email).'?size=150';
	}
	
	/* Уведомления */
	public function countNotify()
	{
		if ( $this->getNotification('is_read = 0')->count())
			return $this->getNotification('is_read = 0')->count();
		else 
			return false;
	}
	public function hasNotify()
	{
		if ( $this->getNotification()->count() > 0)
			return true;
		else 
			return false;
	}
	public function getNotify()
	{
		return $this->getNotification([ 'order' => 'created_at DESC' ]);
	}

	/* Резюме */
	public function countResume()
	{
		if ( $this->getResume()->count())
			return $this->getResume()->count();
		else 
			return false;
	}
	public function hasResume()
	{
		if ( $this->getResume()->count() > 0)
			return true;
		else 
			return false;
	}
	public function getResumes()
	{
		return $this->getResume([ 'order' => 'created_at DESC' ]);
	}

	public function getGender()
	{
		return $this->getGenderList()[$this->gender];
	}
}
