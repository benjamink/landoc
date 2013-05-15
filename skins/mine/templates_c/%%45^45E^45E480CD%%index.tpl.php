<?php /* Smarty version 2.6.13, created on 2006-03-17 15:39:11
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'debug', 'index.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_debug(array(), $this);?>

<html>
<head>
	<title>Index Page</title>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['dflt_styledir']; ?>
main.css" type="text/css" />
</head>
<body>
	<h1><?php echo $this->_tpl_vars['txt']; ?>
</h1>
</body>
</html>