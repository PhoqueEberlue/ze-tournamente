<!DOCTYPE HTML>

    <h3>Ajout d'une equipe :</h3>

    <form action="page.php" method="post">
        <label for="nomTeam">Nom de l'équipe:</label>
        <input type="text" name="NomTeam" id="NomTeam" />
        <br />
        <select name="activite" id="activite">
        <option value="">Choisir une activité</option>
        <?php
            $sql = "SELECT nom_activite FROM `ACTIVITE`";
            $result = mysqli_query($conn, $sql) or die("Requête invalide: ". mysqli_error()."\n".$sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='".$row[0]."'>".$row[0]."</option>\n";
            }
        ?>
        </select>
        <br />
        <input type="submit" name="btn1" value="Ajouter" />
    </form>
    
    <h3>Ajout d'un membre dans une equipe :</h3>
    
    <form action="page.php" method="post">
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
            $sql = "SELECT nom_equipe FROM `EQUIPE`";
            $result = mysqli_query($conn, $sql) or die("Requête invalide: ". mysqli_error()."\n".$sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='".$row[0]."'>".$row[0]."</option>\n";
            }
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

    <h3>Ajout d'un tournoi :</h3>

    <form action="page.php" method="post">
        <label for="nomTournoi">Nom :</label>
        <input type="text" name="nomTournoi" id="nomTournoi" />
        <br />
        <label for="regle">Nom :</label>
        <input type="text" name="regle" id="regle" />
        <br />
        <input type="submit" name="btn4" value="Ajouter" />

   
