<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Base;

class Option {

	public $group;
	public $name;
	public $sanitize_callback;

	public function __construct($group, $name, $sanitize_callback = '')
	{
		$this->group = $group;
		$this->name = $name;
		$this->sanitize_callback = $sanitize_callback;
	}

}