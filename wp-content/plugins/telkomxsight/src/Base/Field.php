<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Base;

class Field {

	public $id;
	public $title;
	public $callback;
	public $args;

	public function __construct($id, $title, $callback = '', $args = null)
	{
		$this->id = $id;
		$this->title = $title;
		$this->callback = $callback;
		$this->args = [
			'label_for' => $this->id
		];
		if(isset($args) && !empty($args))
			$this->args = array_merge($this->args, $args);
	}

}