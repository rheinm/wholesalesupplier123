<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Base;

class Setting {

	public $setting;

	public function createOptionGroup($option_group)
	{
		$this->setting['option_group'] = $option_group;
		return $this;
	}

	public function addField($id, $title, $field_callback = '', $sanitize_callback = '', $args = null)
	{
		if(!isset($this->setting['option_group']))
			throw new Exception("You have to create option group first by calling create function in Setting class");
		$field = new Field($id, $title, $field_callback, $args);
		$option = new Option($this->setting['option_group'], $id, $sanitize_callback);
		$this->setting['fields'][] = $field;
		$this->setting['options'][] = $option;
		return $this;
	}

	public function intoSection($section_name_slug, $title, $callback = '')
	{
		if(!isset($this->setting['option_group']))
			throw new Exception("You have to create option group first by calling create function in Setting class");	
		$section = new Section($section_name_slug, $title, $callback);
		$this->setting['section'] = $section;
		
		return $this;
	}

	public function intoPage($menu_or_submenu)
	{
		if(!isset($this->setting['option_group']))
			throw new Exception("You have to create option group first by calling create function in Setting class");
		$this->setting['page'] = $menu_or_submenu;
		return $this;
	}

	public function generate_for_wp()
	{
		foreach ($this->setting['options'] as $option) {
			register_setting($this->setting['option_group'], $option->name, $option->sanitize_callback);
		}

		add_settings_section($this->setting['section']->id, $this->setting['section']->title, $this->setting['section']->callback, $this->setting['page']->menu_slug);

		foreach ($this->setting['fields'] as $field) {
			add_settings_field($field->id, $field->title, $field->callback, $this->setting['page']->menu_slug, $this->setting['section']->id, $field->args);
		}
	}

}