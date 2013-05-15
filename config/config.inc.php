<?php
/**
 * Global user-level configuration file
 * 
 * @author Benjamin Krein <superbenk@superk.org>
 * @package CONFIG
 */
 
/**
 * Handle site-wide system configuration
 */
require_once('site.inc.php');

/**
 * Set template engine defaults
 */
$tpl_defaults['dflt_title'] = "LANDoc";							// Site default title
$tpl_defaults['dflt_copyright'] = "&copy; Benjamin Krein";		// Site copyright

/**
 * Set configuration defaults
 */
$conf_defaults['lang'] = "en";									// Site default language
?>
