<?php
require_once(INCLUDES.'Smarty/Smarty.class.php');

/**
 * Smarty templating engine setup
 *
 * This class handles the configuration of the Smarty
 * templating engine for this site.
 *
 * @package SMARTY
 * @author Benjamin Krein <superbenk@superk.org>
 */
class Smarty_Site extends Smarty
{
	/**
	 * Smarty configuration constructor
	 */
	function Smarty_Site($defaults=null)
	{
		$this->Smarty();
		$this->template_dir = SKINDIR.'templates/';
		$this->config_dir = SKINDIR.'configs/';
		$this->compile_dir = SKINDIR.'templates_c/';
		$this->cache_dir = SKINDIR.'cache/';
		
		if(!is_null($defaults)) {
			while(list($k,$v) = each($defaults)) {
				$this->assign($k, $v);
			}
		}
	}
}
?>