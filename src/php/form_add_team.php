<?php
include_once("bdd.php");
$bdd = new BDD("localhost", "root", "", "TOURNOIS");
?>
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
        <P style="text-align:center"><img
                    src="https://see.fontimg.com/api/renderfont4/BWqOd/eyJyIjoiZnMiLCJoIjo3NSwidyI6MTAwMCwiZnMiOjc1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiIzAwMDAwMCIsInQiOjF9/WmUgVG91cm5hbWVudGU/robus.png">
        </P>
    </div>
    <div id="contentlmao">
        <div id="main">
            <div id="menu">
                <div id="box"><a href="form_player.php" class="btn_menu">Création joueur</a></div>
                <div id="box"><a href="form_equipe.php" class="btn_menu">Création Equipe</a></div>
                <div id="box"><a href="Mainpage.php" class="btn_menuacceuil"><img
                                src="https://icon-library.com/images/home-logo-icon/home-logo-icon-0.jpg"></a></div>
                <div id="box"><a href="form_add_team.php" class="btn_menu ">Création Tournois</a></div>
                <div id="box"><a href="tournament.php" class="btn_menu">Ze Tournamente</a></div>
            </div>
                
            <form action="form_add_team.php" method="post">
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

            <form action="form_add_team.php" method="post">
                <form-panel id ="panel">
                    <form-header id="Formheader">
                        <h3>Remplissage d'un Tournoi :</h3>
                    </form-header>

                    <form-content>
                    <form-group class="group" id="Choix">
                            <select name="team" id="team">
                                <option value="">Choisir une team</option>
                                <?php
                                $bdd=new BDD("localhost","root","","z_tournament");
                                $equipes = $bdd->get_equipes();
                                foreach ($equipes as $equipe) {
                                    echo "<option value='" . $equipe[0] . "'>" . $equipe[1] . "</option>\n";
                                }
                                
                                ?>
                            </select>
                        </form-group>
                    
                        <form-group class="group">
                        <select name="tournoi" id="tournoi">
                                <option value="">Choisir un tournoi </option>
                                <?php
                                $bdd=new BDD("localhost","root","","z_tournament");
                                $t = $bdd->get_tournois();
                                
                                foreach ($t as $tournoi) {
                                    
                                    echo "<option value='" . $tournoi[0] . "'>" . $tournoi[1] . "</option>\n";
                                }
                                
                                ?>
                            </select>
                        </form-group>

                        <form-group class="group">
                            <input type="submit" name="btn2" value="Ajouter" />
                        </form-group>
                    </form-content>
                </form-panel>

            </form>

            
            <form action="form_add_team.php" method="post">
                <form-panel id ="panel">
                    <form-header id="Formheader">
                        <h3>Generer le tournois  :</h3>
                    </form-header>

                    <form-content>
                    <form-group class="group">
                        <select name="tournoi" id="tournoi">
                                <option value="">Choisir un tournoi </option>
                                <?php
                                $bdd=new BDD("localhost","root","","z_tournament");
                                $t = $bdd->get_tournois();
                                
                                foreach ($t as $tournoi) {
                                    
                                    echo "<option value='" . $tournoi[0] . "'>" . $tournoi[1] . "</option>\n";
                                }
                                
                                ?>
                            </select>
                        </form-group>

                        <form-group class="group">
                            <input type="submit" name="btn7" value="Ajouter" />
                        </form-group>
                    </form-content>
                </form-panel>

            </form>

            <form action="form_add_team.php" method="post">
                <form-panel id ="panel">
                    <form-header id="Formheader">
                        <h3>Supprimer le tournois  :</h3>
                    </form-header>

                    <form-content>
                    <form-group class="group">
                        <select name="tournoi_suppr" id="tournoi_suppr">
                                <option value="">Choisir un tournoi </option>
                                <?php
                                $bdd=new BDD("localhost","root","","z_tournament");
                                $t = $bdd->get_tournois();
                                
                                foreach ($t as $tournoi) {
                                    
                                    echo "<option value='" . $tournoi[0] . "'>" . $tournoi[1] . "</option>\n";
                                }
                                
                                ?>
                            </select>
                        </form-group>

                        <form-group class="group">
                            <input type="submit" name="btn8" value="Supprimer" />
                        </form-group>
                    </form-content>
                </form-panel>

            </form>
 


        </div>
        
    </div>


    
    </body>
        
    <?php



    if (isset($_POST["btn4"])) {
        $str_error="";
        $bool = True;
        if (isset($_POST["nomTournoi"]) && $_POST["nomTournoi"] == "") {
            $str_error.="Veuillez ecrire un nom de tournoi <br>";
            $bool = False;
        }
        if (isset($_POST['regle']) && $_POST['regle'] == "") {
            $str_error.="Veuillez ecrire une règle";
            $bool = False;
        }

        if ($bool) {
            $bdd->add_tournoi_complet($_POST["nomTournoi"],$_POST['regle']);
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo "<h2 style='color:white'>".$str_error."</h2>";
        }
    }


    if (isset($_POST["btn2"])) {
        $str_error="";
        $bool = True;
        if (isset($_POST["team"]) && $_POST["team"] == "") {
            $str_error.="Veuillez selectionner une team <br>";
            $bool = False;
        }
        if (isset($_POST['tournoi']) && $_POST['tournoi'] == "") {
            $str_error.="Veuillez selectionner un tournoi";
            $bool = False;
        }

        if ($bool) {
            $bdd->add_team_tournoi($_POST["team"],$_POST['tournoi']);
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo "<h2 style='color:white'>".$str_error."</h2>";
        }
    }



    if (isset($_POST["btn7"])) {
        $str_error="";
        $bool = True;

        if (isset($_POST['tournoi']) && $_POST['tournoi'] == "") {
            $str_error.="Veuillez selectionner un tournoi";
            $bool = False;
        }
        if ($bool) {
            //include "bdd.php";
        
            $bdd = new BDD("localhost", "root", "", "z_tournament");
        
            $tournament_id = $_POST["tournoi"];
            $equipes=$bdd->get_equipe_tournois_id($tournament_id);
            $tab=array();
            foreach ($equipes as $key => $values) {
                array_push($tab,$values[0]);
            }
            
            $bdd->set_liste_equipe($tab);
            $nb_equipe=count($equipes);
        
            $bdd->create_tree($nb_equipe, $tournament_id);  
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo "<h2 style='color:white'>".$str_error."</h2>";
        }

        
    }

    if(isset($_POST["btn8"])){
        $str_error="";
        $bool = True;

        if (isset($_POST['tournoi_suppr']) && $_POST['tournoi_suppr'] == "") {
            $str_error.="Veuillez selectionner un tournoi";
            $bool = False;
        }
        if ($bool) {
            //include "bdd.php";
        
            $bdd = new BDD("localhost", "root", "", "z_tournament");
        
            $tournament_id = $_POST["tournoi_suppr"];

            $bdd->delete_tournois($tournament_id);
            echo "<meta http-equiv='refresh' content='0'>";
            
        }else{
            echo "<h2 style='color:white'>".$str_error."</h2>";
        }

    }


    ?>
</html>
