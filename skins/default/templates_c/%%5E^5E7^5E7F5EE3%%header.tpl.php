<?php /* Smarty version 2.6.13, created on 2006-03-28 21:50:28
         compiled from wrapper/header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $this->_tpl_vars['dflt_title'];  if ($this->_tpl_vars['long_title']): ?> - <?php echo $this->_tpl_vars['long_title'];  endif; ?></title>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['dflt_styledir']; ?>
main.css" type="text/css" />
</head>
<body>
<div id="header_banner">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wrapper/header_banner.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="header_tabbar">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wrapper/header_tabbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>