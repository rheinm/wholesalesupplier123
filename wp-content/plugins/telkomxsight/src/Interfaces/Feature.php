<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\Interfaces;

interface Feature {
	public function register_settings();
	public function register_shortcodes();
	public function register_pages();
	public function register_hooks();
	public function addParent($parent);
}