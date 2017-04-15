<?php

namespace Phalcon;

class OpenGraph
{
	private $type = null;
	private $site_name = null;
	private $title = null;
	private $description = null;
	private $url = null;
	private $image = null;

	public function input($parameter)
	{
		if ($parameter['type'])
			$this->type = $parameter['type'];

		if ($parameter['site_name'])
			$this->site_name = $parameter['site_name'];

		if ($parameter['title'])
			$this->title = $parameter['title'];

		if ($parameter['description'])		
			$this->description = $parameter['description'];

		if ($parameter['url'])
			$this->url = $parameter['url'];

		if ($parameter['image'])
			$this->image = $parameter['image'];
	}

	public function output()
	{
		$meta = '';
		
		$meta .= '<meta property="fb:app_id" content="1013606032007852">'."\r\n";

		if ($this->type)
			$meta .= '<meta property="og:type" content="' . $this->type . '">'."\r\n";
		
		if ($this->site_name)
			$meta .= '<meta property="og:site_name" content="' . $this->site_name . '">'."\r\n";
		
		if ($this->title)
			$meta .= '<meta property="og:title" content="' . $this->title . '">'."\r\n";
		
		if ($this->description)
			$meta .= '<meta property="og:description" content="' . $this->description . '.">'."\r\n";
		
		if ($this->url)
			$meta .= '<meta property="og:url" content="' . $this->url . '">'."\r\n";

		if ($this->image)
			$meta .= '<meta property="og:image" content="' . $this->image . '">'."\r\n";

		return $meta;
	}
}