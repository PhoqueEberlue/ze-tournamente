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

<form action="form_add_team.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'un membre dans une equipe :</h3>
            </form-header>

            <form-content>
            
                <form-group class="group" id="Choix">
                    <select name="equipe" id="equipe">
                    <option value="">Choisir une équipe</option>
                    <?php
                    get_equipe();
                    ?>
                    </select>
                </form-group>

                <form-group class="group" id="Choix">
                    <select name="membre" id="membre">
                    <option value="">Choisir un membre </option>
                    <?php
                    get_membre();
                    ?>
                    </select>
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn1" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>
</body>
</html>

<?php


function trait_form_team(){
    
    include_once("bdd.php"); 

    $sql="INSERT INTO est_membre (id_participant,id_equipe)
    VALUES ('".$_POST['membre']."',".$_POST['equipe'].")";
    $bdd=new BDD("localhost","root","","z_tournament");
    $bdd->insert($sql);

}
function get_equipe(){
    include "bdd.php";   
      $sql = "SELECT id_equipe,nom_equipe FROM `equipe`";
      $bdd=new BDD("localhost","root","","z_tournament");
      $res=$bdd->select($sql);
      while ($row = mysqli_fetch_array($res)) {
          var_dump($row);
          echo "<option value='".$row[0]."'>".$row[1]."</option>\n";
      }
  }
  
  function get_membre(){
   
      $sql = "SELECT id_participant,nom_participant,prenom_participant FROM `participant`";
      $bdd=new BDD("localhost","root","","z_tournament");
      $res=$bdd->select($sql);
      while ($row = mysqli_fetch_array($res)) {
          var_dump($row);
          echo "<option value='".$row['id_participant']."'>".$row['nom_participant']." ".$row['prenom_participant']."</option>\n";
      }
  }




  

if(isset($_POST["btn1"])){
    $bool=True;
    if(isset($_POST["equipe"]) && $_POST["equipe"]==""){
        echo "Veuillez selectionner un nom <br>";
        $bool=False;
    }
    if (isset($_POST['membre']) && $_POST['membre']=="") {
        echo "Veuillez ecrire un prenom";
        $bool=False;
    }
    
    if($bool){
        trait_form_team();
    }
    
}

?>