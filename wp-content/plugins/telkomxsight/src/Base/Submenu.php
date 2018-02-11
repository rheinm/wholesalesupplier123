<?php
/**
 * @package TelkomXsight
 */
namespace Xsight\Base;

class Submenu {

	private $parent;
	private $page_title;
	private $menu_titile;
	private $capability;
	private $function;

	public $menu_slug;

	public function __construct($page_title, $menu_title, $capability, $menu_slug, $function = '')
	{
		$this->page_title = $page_title;
		$this->menu_title = $menu_title;
		$this->capability = $capability;
		$this->menu_slug = $menu_slug;
		$this->function = $function;
	}

	public function addParentMenu($parent)
	{
		$this->parent = $parent;
	}

	public function add()
	{
		add_submenu_page($this->parent->menu_slug, $this->page_title, $this->menu_title, $this->capability, $this->menu_slug, $this->function);
	}
}