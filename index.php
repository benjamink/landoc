<?php
session_start();
require_once('config/config.inc.php');

/*
require_once('DB.php');

$dsn = array(
	'phptype' => 'sqlite',
	'database' => "db/landoc",
	'mode' => '0644'
);

$db = DB::Connect($dsn);
if (PEAR::isError($db)) {
    die($db->getMessage());
}

$id = $db->nextId('groups');
if (PEAR::isError($id)) {
	die($db->getMessage());
}

$q = $db->query('INSERT INTO groups (g_id, added, g_name, g_desc) VALUES ('.$id.', DATETIME("NOW", "LOCALTIME"), "Test2", "Dummy Group2")');

$res = $db->getAll('SELECT * FROM groups', DB_FETCHMODE_OBJECT);

print_r($res);
*/

$tpl = new Smarty_Site($tpl_defaults);

$tpl->assign('txt', 'MAIN_BLOCK');
$tpl->assign('long_title', 'Home Page');

$tpl->display('wrapper/header.tpl');
$tpl->display('index.tpl');
$tpl->display('wrapper/footer.tpl');
?>