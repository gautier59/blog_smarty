<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-18 17:51:57
         compiled from "templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10324549304df079ad3-43304503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6358f059738e0da1fcc0ff5efd834f2e41ce656f' => 
    array (
      0 => 'templates\\test.tpl',
      1 => 1418921514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10324549304df079ad3-43304503',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549304df1481d1_09706027',
  'variables' => 
  array (
    'hello_world' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549304df1481d1_09706027')) {function content_549304df1481d1_09706027($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
 <html>
	<head>
		<title>Test smarty</title>
	</head>
	<body>
		<h1>Test smarty</h1>
		<!-- ici j'injecte la donnée qui vient de mon script PHP "<?php echo $_smarty_tpl->tpl_vars['hello_world']->value;?>
" -->
		<h2 color="red"><?php echo $_smarty_tpl->tpl_vars['hello_world']->value;?>
</h2>
	</body>
</html>
<?php }} ?>
