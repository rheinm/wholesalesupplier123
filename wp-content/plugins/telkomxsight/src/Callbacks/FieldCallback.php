<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Callbacks;

class FieldCallback {

	public function checkBox($args)
	{
		$class = $args['class'];
		$name = $args['label_for'];

		echo '<input class="'.$class.'" type="checkbox" name="'.$name.'" value="1" '.(get_option($name) ? 'checked' : '').'>';
	}

	public function span($args)
	{
		$id = $args['label_for'];
		echo '<span id="'.$id.'"></span>';
	}

	public function textArea($args)
	{
		$name = $args['label_for'];
		echo '<textarea name="'.$name.'"></textarea>';
	}

	public function textField($args)
	{
		$name = $args['label_for'];

		echo '<input type="text" name="'.$name.'" value="'.get_option($name).'">';
	}

	public function button($args)
	{
		echo '<button>Request Access Token</button>';
	}

}