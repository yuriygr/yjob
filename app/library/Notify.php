<?php

namespace Phalcon;

use Phalcon\Mvc\User\Component;

class Notify extends Component
{
	public function normal($user_id, $text)
	{	
		$notification 				= 	new \Notification();
		$notification->user_id		=	$user_id;
		$notification->type 		=	'normal';
		$notification->text			=	$text;
		$notification->created_at 	= 	time();

		if ($notification->save())
			return true;
		else
			return false;
	}

	public function points($user_id, $text)
	{	
		$notification 				= 	new \Notification();
		$notification->user_id		=	$user_id;
		$notification->type 		=	'points';
		$notification->text			=	$text;
		$notification->created_at 	= 	time();

		if ($notification->save())
			return true;
		else
			return false;
	}
	
	public function security($user_id, $text)
	{	
		$notification 				= 	new \Notification();
		$notification->user_id		=	$user_id;
		$notification->type 		=	'security';
		$notification->text			=	$text;
		$notification->created_at 	= 	time();

		if ($notification->save())
			return true;
		else
			return false;
	}
}