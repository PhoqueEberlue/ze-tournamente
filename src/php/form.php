<!DOCTYPE HTML>

    <h3>Ajout d'une equipe :</h3>

    <form action="form.php" method="post">
        <label for="nomTeam">Nom de l'équipe:</label>
        <input type="text" name="NomTeam" id="NomTeam" />
        <br />
        <select name="activite" id="activite">
        <option value="" required>Choisir une activité</option>
        <?php
           get_activite();
        ?>
        </select>
        <br />
        <input type="submit" name="btn1" value="Ajouter" />
    </form>
    
    <h3>Ajout d'un membre dans une equipe :</h3>
    
    <form action="page.php" method="post" name>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" />
        <br />
        <label for="prenom" >Prenom :</label>
        <input type="text" name="prenom" id="prenom" />
        <br />
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" />
        <br />
        <select name="equipe" id="equipe">
            <option value="">Choisir une équipe</option>
            <?php
            get_nom_equipe();
            ?>
        </select>
        <input type="submit" name="btn2" value="Ajouter" />
        
    </form>

    <h3>Ajout d'une activité :</h3>

    <form action="page.php" method="post">
        <label for="nomActivite">Nom :</label>
        <input type="text" name="nomActivite" id="nomActivite" />
        <br />
        <input type="submit" name="btn3" value="Ajouter" />
        
    </form>

    <!--<h3>Ajout d'un tournoi :</h3>

    <form action="page.php" method="post">
        <label for="nomTournoi">Nom :</label>
        <input type="text" name="nomTournoi" id="nomTournoi" />
        <br />
        <label for="regle">Nom :</label>
        <input type="text" name="regle" id="regle" />
        <br />
        <input type="submit" name="btn4" value="Ajouter" />-->

   


<?php
 



function get_activite(){
  include "bdd.php";   
    $sql = "SELECT id_activite,nom_activite FROM `activite`";
    $bdd=new BDD("localhost","root","","z_tournament");
    $res=$bdd->select($sql);
    while ($row = mysqli_fetch_array($res)) {
        var_dump($row);
        echo "<option value='".$row[0]."'>".$row[1]."</option>\n";
    }
}

function get_nom_equipe(){
    //include "bdd.php";  
    $sql = "SELECT id_equipe,nom_equipe FROM `equipe`";
    $bdd=new BDD("localhost","root","","z_tournament");
    $res=$bdd->select($sql);
    while ($row = mysqli_fetch_array($res)) {
        echo "<option value='".$row[0]."'>".$row[1]."</option>\n";
    }
}


function trait_form_equipe(){
    //include "bdd.php";  
    $sql="INSERT INTO equipe (nom_equipe,id_activite)
    VALUES ('".$_POST['NomTeam']."',".$_POST['activite'].")";
    $bdd=new BDD("localhost","root","","z_tournament");
    $bdd->insert($sql);

}

if(isset($_POST["btn1"])){
    $bool=True;
    if(isset($_POST["activite"]) && $_POST["activite"]==""){
        echo "Veuillez selectionner une activite <br>";
        $bool=False;
    }if (isset($_POST['NomTeam']) && $_POST['NomTeam']=="") {
        echo "Veuillez ecrire un nom d equipe";
        $bool=False;
    }
    if($bool){
        trait_form_equipe();
    }
    
}

if(isset($_POST["btn2"])){
    $bool=True;
}


?>