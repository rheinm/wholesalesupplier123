<?php
/**
 * @package TelkomXsight
 */
namespace Xsight\Base;

class Menu {

	private $icon_url;
	private $position;

	private $page_title;
	private $menu_titile;
	private $capability;
	private $function;

	public $menu_slug;

	public function __construct($page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null)
	{
		$this->page_title = $page_title;
		$this->menu_title = $menu_title;
		$this->capability = $capability;
		$this->menu_slug = $menu_slug;
		$this->function = $function;
		$this->icon_url = $icon_url;
		$this->position = $position;
	}

	public function add()
	{
		add_menu_page($this->page_title, $this->menu_title, $this->capability, $this->menu_slug, $this->function, $this->icon_url, $this->position);
	}
}