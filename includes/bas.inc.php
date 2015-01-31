          </div>        
          <nav class="span4">
            <h2>Menu</h2>
            <form action="index.php" method="get" class="form-inline">
				<div class="form-group">
					<input type="text" name="r" placeholder="Recherche" class="span3">
					<input type="submit" value="OK" class="btn">
				</div>
			</form>
            <ul><?php /*Menu du blog*/
				if($connecte) { ?>
					<li><a href="index.php?p=1">Accueil</a></li>	
					<li><a href="deconnexion.php">Déconnexion</a></li>				
					<li><a href="article.php">Rédiger un article</a></li>
				<?php }else{ ?>
					<li><a href="index.php?p=1">Accueil</a></li>
					<li><a href="inscription.php">Inscription</a></li>
					<li><a href="connexion.php">Connexion</a></li>					
				<?php } ?>
            </ul>          
          </nav>
        </div>        
      </div>
      <footer>
        <p>&copy; Nilsine & ULCO 2012</p>
      </footer>
    </div>
	
	<script>
		function clearnotif() {	//fonction pour cacher les notifs
			$(".alert").fadeOut("slow");
		}
		$(document).ready(function(){ 
			setTimeout(function(){ 
				clearnotif();
			}, 5000);	//time out de 5sec
			$("#croix").click(function(){
				clearnotif();
			});
		});
	</script>
  </body>
</html>

