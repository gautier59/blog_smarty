<div id="chargement">Chargement des articles...<br>
	<img id="chargement-photos" src="assets/images/ajax-loader.gif" />
</div>
<div id="containers">
	<h4 class="souligne">{$titre_din}</h4>

	{foreach $tab_articles AS $article}
		<h1>{$article.titre|htmlspecialchars|nl2br}</h1>
		<!-- Si le texte est supérieur à 400 caractères on affiche trois petits points et un bouton pour lire la suite -->
		{if $article.texte|strlen <= 400}
			<p>{$article.texte|htmlspecialchars|nl2br}</p> 
		{else} 
			<p>{$article.texte|htmlspecialchars|nl2br|substr:0:400} ... <p>
			<a href='#'  data-id='{$article.id_article}' class='afficher-article'>Lire la suite</a><br>
		{/if}
		<h4 class="parution">Paru le {$article.date|date_format:"%d/%m/%y"} par : {$article.nom} {$article.prenom}</h4><br><br>
		{if $connecte}
			<a href = 'article.php?id={$article.id_article}' class= 'btn btn-primary'> Modifier</a>&nbsp;&nbsp;
			<a href = 'sup_article.php?id={$article.id_article}' class= 'btn btn-danger'> Supprimer</a>
		{/if}

		<HR noshade size='50px' width='100%' align='center'>
	{/foreach}

	<!--Pagination-->
	{if isset($smarty.get.r)}	<!--si c'est une recherche ...-->
		<nav>
			<ul class="pagination">
			{if $page!=1}
				<li  class= "enabled" ><a href="index.php?r={$recherche}&p={$page-1}"> &laquo; </a></li>
			{/if}
			{for $n=1 to $nb_pages}
				<li><a href="index.php?r={$recherche}&p={$n}">{$n}</a></li>
			{/for}
			{if $page+1 <= $nb_pages} 
				<li  class= "enabled" ><a href="index.php?r={$recherche}&p={$page+1}"> &raquo; </a></li>
			{/if} 
			</ul>
		</nav>
	{else}	<!--Sinon-->
		<nav>
			<ul class="pagination">
			{if $page!=1}
				<li  class= "enabled" ><a href="index.php?p={$page-1}"> &laquo; </a></li>
			{/if}
			{for $n=1 to $nb_pages}
				{if $n == ($smarty.get.p)}
					<li class="active"><a href="index.php?p={$n}">{$n}</a></li>
				{else}
					<li><a href="index.php?p={$n}">{$n}</a></li>
				{/if}
			{/for} 
			{if $page+1 <= $nb_pages} 
				<li  class= "enabled" ><a href="index.php?p={$page+1}"> &raquo; </a></li>
			{/if}
			</ul>
		</nav>
	{/if}
</div>