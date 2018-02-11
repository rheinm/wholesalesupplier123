<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Base;

class Section {	

	public $id;
	public $title;
	public $callback;
	public $page;

	public function __construct($id, $title, $callback = '')
	{
		$this->id = $id;
		$this->title = $title;
		$this->callback = $callback;
	}
}