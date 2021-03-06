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

                
        <form action="form_player.php" method="post">
                <form-panel id="panel">
                    <form-header id="Formheader">
                        <h3>Suppression d'un membre :</h3>
                    </form-header>

                    <form-content>
                        <form-group class="group" id="Choix">
                            <select name="membre" id="membre">
                                <option value="">Choisir un membre</option>
                                <?php
                                include_once("bdd.php");
                                $bdd = new BDD("localhost", "root", "", "z_tournament");
                                $membres = $bdd->get_membres();
                                foreach ($membres as $membre) {
                                    echo "<option value='" . $membre[0] . "'>" . $membre[1] . " " . $membre[2] . "</option>\n";
                                }
                                ?>
                            </select>
                        </form-group>

                        <form-group class="group">
                            <input type="submit" name="btn8" value="Supprimer"/>
                        </form-group>
                    </form-content>
                </form-panel>
            </form>
    
    </div>
    
</div>

</body>
</html>


<?php
include_once("bdd.php");
$bdd = new BDD("localhost", "root", "", "z_tournament");

if(isset($_POST["btn2"])){
    $str_error="";
    $bool=True;
    if(isset($_POST["nom"]) && $_POST["nom"]==""){
        $str_error.="Veuillez selectionner un nom <br>";
        $bool=False;
    }
    if (isset($_POST['prenom']) && $_POST['prenom']=="") {
        $str_error.="Veuillez ecrire un prenom <br>";
        $bool=False;
    }
    if(isset($_POST['pseudo']) && $_POST['pseudo']=="") {
        $str_error.="Veuillez ecrire un prenom <br>";
        $bool=False;
    }
    if($bool){
        $bdd->add_player($_POST['pseudo'], $_POST['nom'], $_POST['prenom']);
        echo "<meta http-equiv='refresh' content='0'>";
    }else{
        echo "<h2 style='color:white'>".$str_error."</h2>";
    }
}


if(isset($_POST["btn8"])){
    $str_error="";
    $bool=True;
    if(isset($_POST["membre"]) && $_POST["membre"]==""){
        $str_error.="Veuillez selectionner un nom <br>";
        $bool=False;
    }

    if($bool){
        echo "test";
        $bdd->delete_membre($_POST["membre"]);
    }else{
        echo "<h2 style='color:white'>".$str_error."</h2>";
    }

}
?>