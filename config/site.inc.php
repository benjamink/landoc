<?php
/**
 * General site configuration
 * 
 * @author Benjamin Krein <superbenk@superk.org>
 * @package CONFIG
 */
 
 /**
  * Setup site constants
  */
 define('SITEDIR', $_SERVER['DOCUMENT_ROOT']);
 define('SITEADDR', $_SERVER['HTTP_HOST']);
 define('INCLUDES', SITEDIR.'/include/');
 define('SKINDIR', SITEDIR.'/skins/'.(isset($_SESSION['ld_pref_skin']) ? $_SESSION['ld_pref_skin'] : 'default').'/');
 define('DB', SITEDIR.'db/');
 
 /**
  * Create Smarty defaults array
  */
 $tpl_defaults['dflt_styledir'] = '/skins/'.(isset($_SESSION['ld_pref_skin']) ? $_SESSION['ld_pref_skin'] : 'default').'/styles/';
 
 /**
  * Configure custom include path
  */
 $cur_path = ini_get('include_path');
 
 $add_path = array(
   INCLUDES,
   INCLUDES.'pear/php/'
 );
 
 $set_path = "";
 foreach($add_path as $k=>$v) {
    $set_path .= ':'.$v;
 }
    
 ini_set('include_path', $cur_path.$set_path);
 
 /**
  * Set defaults in session
  */
 if(!isset($_SESSION['ld_set'])) {
 	$_SESSION['ld_set'] = 1;
 	foreach($conf_defaults as $k => $v) {
 		$_SESSION['ld_'.$k] = $v;
 	}
 }
 
 /**
  * Pull in universally used libraries
  */
 require_once('smarty.class.inc.php');
?>