<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Mainpage.css"/>
    <title>Ze Tournamente</title>
</head>
<body class="body">

<div id="Title">
<P style="text-align:center"><img src="https://see.fontimg.com/api/renderfont4/BWqOd/eyJyIjoiZnMiLCJoIjo3NSwidyI6MTAwMCwiZnMiOjc1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiIzAwMDAwMCIsInQiOjF9/WmUgVG91cm5hbWVudGU/robus.png"></P>
</div>
<div id="contentlmao">
    <div id="main">
        <div id="menu">
            <div id="box"><a href="Créationjoueur.php" class="btn_menu">Création joueur</a></div>
            <div id="box"><a href="creationequipe.php" class="btn_menu">Création Equipe</a></div>
            <div id="box"><a href="Mainpage.php" class="btn_menuacceuil" ><img src="https://icon-library.com/images/home-logo-icon/home-logo-icon-0.jpg"></a></div>  
            <div id="box"><a href="ajoutermembreequipe.php" class="btn_menu ">Création Tournois</a></div>   
            <div id="box"><a href="tournois.php" class="btn_menu">Ze Tournamente</a></div> 
        </div>
        <div id="listtournois">
    
        <?php

        $sql = "SELECT nom_tournoi FROM `Tournoi`";

        $result = mysqli_query($conn, $sql) or die("Requête invalide: ". mysqli_error()."\n".$sql);
        echo "<h2> Liste des types des tournois </h2>\n";

        echo"<form action='ze_tournamente' method='post'>";
        while ($row = mysqli_fetch_array($result)) 
        { 
            echo "<input type='submit' value=".$row['nom_tournois']." class='btntournoi' name=".$row['nom_tournois']."></br></br>";
        }
        echo "</form>";
        ?>
        </div>
    </div>
</div>
</body>
</html>