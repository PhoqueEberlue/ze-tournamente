<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Mainpage.css"/>
    <link rel="stylesheet" href="../css/jquery.bracket.min.css"/>
    <title>Ze Tournamente</title>
</head>
<body class="body">

<div id="Title">
<P style="text-align:center"><img src="https://see.fontimg.com/api/renderfont4/BWqOd/eyJyIjoiZnMiLCJoIjo3NSwidyI6MTAwMCwiZnMiOjc1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiIzAwMDAwMCIsInQiOjF9/WmUgVG91cm5hbWVudGU/robus.png"></P>
</div>
<div id="contentlmao">
    <div id="main">
        <div id="menu">
                <div id="box"><a href="form_player.php" class="btn_menu">Création joueur</a></div>
                <div id="box"><a href="form_equipe.php" class="btn_menu">Création Equipe</a></div>
                <div id="box"><a href="Mainpage.php" class="btn_menuacceuil" ><img src="https://icon-library.com/images/home-logo-icon/home-logo-icon-0.jpg"></a></div>  
                <div id="box"><a href="form_add_team.php" class="btn_menu ">Création Tournois</a></div>   
                <div id="box"><a href="tournament.php" class="btn_menu">Ze Tournamente</a></div> 
        </div>

        <h3>Listes des tournois</h3>
        <h3>  
            <?php
            get_all_tournois();
        ?>
        </h3>

      
    </div>
        


</div>


</body>
</html>


<?php


function get_all_tournois(){
    include "bdd.php";

    $bdd = new BDD("localhost", "root", "", "z_tournament");

    $requete="SELECT id_tournoi,nom_tournoi from tournois";
    $res=$bdd->get_tournois();
    
    $str="<ul>";

    foreach ($res as $key => $value) {

        $str.="<li><a href='tournament_tps_reel.php?id=".$value[0]."'> ".$value[1]."</a></li>";
    }

  
    $str.="</ul>";

    echo $str;

}







?>

