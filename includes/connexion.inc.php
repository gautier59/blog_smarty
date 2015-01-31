<?php	/*connexion à la base de donnée*/
	session_start();
	ini_set('display_errors','off');
	mysql_connect('localhost','root','lprsc');
	mysql_select_db('blog_rg');
