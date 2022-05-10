
<!DOCTYPE HTML>

    <style>
    <?php include '../css/form.css'; ?>
    </style>


    





 

    



    <form action="form.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'une activité :</h3>
            </form-header>
        
            <form-content>
                <form-group class="group">
                    <label for="nomActivite">Nom :</label>
                    <input type="text" name="nomActivite" id="nomActivite" />
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn3" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>



    <form action="form.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'un tournoi :</h3>
            </form-header>

            <form-content>
                <form-group class="group">
                    <label for="nomTournoi">Nom :</label>
                    <input type="text" name="nomTournoi" id="nomTournoi" />
                </form-group>
            
                <form-group class="group">
                    <label for="regle">Regle :</label>
                    <input type="text" name="regle" id="regle" />
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn4" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>




    <form action="form.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'un membre dans une equipe :</h3>
            </form-header>

            <form-content>
            
                <form-group class="group" id="Choix">
                    <select name="Equipe" id="equipe">
                    <option value="">Choisir une équipe</option>
                    </select>
                </form-group>

                <form-group class="group" id="Choix">
                    <select name="membre" id="membre">
                    <option value="">Choisir un membre </option>
                    </select>
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn1" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>

