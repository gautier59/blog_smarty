<?php /* Smarty version Smarty-3.1-DEV, created on 2015-01-31 18:13:25
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92638393954cd0d351a7286-15709821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1422724390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92638393954cd0d351a7286-15709821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titre_din' => 0,
    'tab_articles' => 0,
    'article' => 0,
    'connecte' => 0,
    'page' => 0,
    'recherche' => 0,
    'nb_pages' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54cd0d35237af7_05253182',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54cd0d35237af7_05253182')) {function content_54cd0d35237af7_05253182($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/share/php/smarty3/plugins/modifier.date_format.php';
?>﻿<div id="chargement">Chargement des articles...<br>
	<img id="chargement-photos" src="assets/images/ajax-loader.gif" />
</div>
<div id="containers">
	<h4 class="souligne"><?php echo $_smarty_tpl->tpl_vars['titre_din']->value;?>
</h4>

	<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tab_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
		<h1><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['titre']));?>
</h1>
		<!-- Si le texte est supérieur à 400 caractères on affiche trois petits points et un bouton pour lire la suite -->
		<?php if (strlen($_smarty_tpl->tpl_vars['article']->value['texte'])<=400){?>
			<p><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['texte']));?>
</p> 
		<?php }else{ ?> 
			<p><?php echo substr(nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['texte'])),0,400);?>
 ... <p>
			<a href='#'  data-id='<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
' class='afficher-article'>Lire la suite</a><br>
		<?php }?>
		<h4 class="parution">Paru le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['date'],"%d/%m/%y");?>
 par : <?php echo $_smarty_tpl->tpl_vars['article']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['prenom'];?>
</h4><br><br>
		<?php if ($_smarty_tpl->tpl_vars['connecte']->value){?>
			<a href = 'article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
' class= 'btn btn-primary'> Modifier</a>&nbsp;&nbsp;
			<a href = 'sup_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id_article'];?>
' class= 'btn btn-danger'> Supprimer</a>
		<?php }?>

		<HR noshade size='50px' width='100%' align='center'>
	<?php } ?>

	<!--Pagination-->
	<?php if (isset($_GET['r'])){?>	<!--si c'est une recherche ...-->
		<nav>
			<ul class="pagination">
			<?php if ($_smarty_tpl->tpl_vars['page']->value!=1){?>
				<li  class= "enabled" ><a href="index.php?r=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"> &laquo; </a></li>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['n']->step = 1;$_smarty_tpl->tpl_vars['n']->total = (int)ceil(($_smarty_tpl->tpl_vars['n']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['n']->step));
if ($_smarty_tpl->tpl_vars['n']->total > 0){
for ($_smarty_tpl->tpl_vars['n']->value = 1, $_smarty_tpl->tpl_vars['n']->iteration = 1;$_smarty_tpl->tpl_vars['n']->iteration <= $_smarty_tpl->tpl_vars['n']->total;$_smarty_tpl->tpl_vars['n']->value += $_smarty_tpl->tpl_vars['n']->step, $_smarty_tpl->tpl_vars['n']->iteration++){
$_smarty_tpl->tpl_vars['n']->first = $_smarty_tpl->tpl_vars['n']->iteration == 1;$_smarty_tpl->tpl_vars['n']->last = $_smarty_tpl->tpl_vars['n']->iteration == $_smarty_tpl->tpl_vars['n']->total;?>
				<li><a href="index.php?r=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</a></li>
			<?php }} ?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value+1<=$_smarty_tpl->tpl_vars['nb_pages']->value){?> 
				<li  class= "enabled" ><a href="index.php?r=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
"> &raquo; </a></li>
			<?php }?> 
			</ul>
		</nav>
	<?php }else{ ?>	<!--Sinon-->
		<nav>
			<ul class="pagination">
			<?php if ($_smarty_tpl->tpl_vars['page']->value!=1){?>
				<li  class= "enabled" ><a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"> &laquo; </a></li>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['n']->step = 1;$_smarty_tpl->tpl_vars['n']->total = (int)ceil(($_smarty_tpl->tpl_vars['n']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['n']->step));
if ($_smarty_tpl->tpl_vars['n']->total > 0){
for ($_smarty_tpl->tpl_vars['n']->value = 1, $_smarty_tpl->tpl_vars['n']->iteration = 1;$_smarty_tpl->tpl_vars['n']->iteration <= $_smarty_tpl->tpl_vars['n']->total;$_smarty_tpl->tpl_vars['n']->value += $_smarty_tpl->tpl_vars['n']->step, $_smarty_tpl->tpl_vars['n']->iteration++){
$_smarty_tpl->tpl_vars['n']->first = $_smarty_tpl->tpl_vars['n']->iteration == 1;$_smarty_tpl->tpl_vars['n']->last = $_smarty_tpl->tpl_vars['n']->iteration == $_smarty_tpl->tpl_vars['n']->total;?>
				<?php if ($_smarty_tpl->tpl_vars['n']->value==($_GET['p'])){?>
					<li class="active"><a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</a></li>
				<?php }else{ ?>
					<li><a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</a></li>
				<?php }?>
			<?php }} ?> 
			<?php if ($_smarty_tpl->tpl_vars['page']->value+1<=$_smarty_tpl->tpl_vars['nb_pages']->value){?> 
				<li  class= "enabled" ><a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
"> &raquo; </a></li>
			<?php }?>
			</ul>
		</nav>
	<?php }?>
</div><?php }} ?>