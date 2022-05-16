<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Mainpage.css"/>
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

    
    </div>
</div>
<form action="form_player.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'un membre :</h3>
            </form-header>
            
            <form-content>
                <form-group class="group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" />
                </form-group>

                <form-group class="group">
                    <label for="prenom" >Prenom :</label>
                    <input type="text" name="prenom" id="prenom" />
                </form-group>

                <form-group class="group">
                    <label for="pseudo">Pseudo :</label>
                    <input type="text" name="pseudo" id="pseudo" />
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn2" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>
</body>
</html>


<?php


function trait_form_player(){
    
    include_once("bdd.php"); 

    $sql="INSERT INTO participant (pseudo_participant,nom_participant,prenom_participant)
    VALUES ('".$_POST['pseudo']."',".$_POST['nom'].",'".$_POST['prenom']."')";
    $bdd=new BDD("localhost","root","","z_tournament");
    $bdd->insert($sql);

}




if(isset($_POST["btn2"])){
    $bool=True;
    if(isset($_POST["nom"]) && $_POST["nom"]==""){
        echo "Veuillez selectionner un nom <br>";
        $bool=False;
    }
    if (isset($_POST['prenom']) && $_POST['prenom']=="") {
        echo "Veuillez ecrire un prenom";
        $bool=False;
    }
    if(isset($_POST['pseudo']) && $_POST['pseudo']=="") {
        echo "Veuillez ecrire un prenom";
        $bool=False;
    }
    if($bool){
        trait_form_player();
    }
    
    
}

?>