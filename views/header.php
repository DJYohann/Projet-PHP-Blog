<header>
<!--Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container mr-1">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav">
                <?php
                    $page = explode("/", $_SERVER['PHP_SELF']);
                    $page = end($page);
                    switch ($page)
                    {
                        case "connection.php":
                            echo "<li class=\"nav-item\"> <a href=\"../index.php\" class=\"nav-link active\">accueil</a></li>";
                            break;
                        case "blog.php":
                            var_dump($admin);
                            if ($admin) {
                                echo "<li class=\"nav-item\"> <a href=\"../views/connection.php\" class=\"nav-link active\">déconnexion</a></li>";
                            }
                            echo "<li class=\"nav-item\"> <a href=\"../views/connection.php\" class=\"nav-link active\">connexion</a></li>";
                            break;
                        case "index.php":
                            echo "<li class=\"nav-item\"> <a href=\"./views/connection.php\" class=\"nav-link active\">connexion</a></li>";
                            break;
                    }
                    if ($page == "index.php" && !isset($_REQUEST['action']))
                    {
                        echo '<li class=\"nav-item\">
                                <form  action="#" method="get">
                                    <div class="form-group d-flex mt-2">
                                     <label class="mt-2 mr-1" for="input">Rechercher (date) : </label>
                                     <div class="input d-flex">
                                         <input type="text" class="form-control" id="input">
                                         <button type="submit" style="background-color: white">ok</button>
                                     </div>
                                 </div>
                             </form>
                         </li>';
                    }
                    ?>
                </li>
                    <label class="header-label">nb commentaires blog : <?php echo "$nbComments" ?> </label>
                    <label class="header-label">nb commenaires client : </label>
                    <label class="header-label"> connecté : <?php echo $_SESSION['login'] ?> </label>
			</ul>
		</div>
        </div>
	</nav>
</header>
