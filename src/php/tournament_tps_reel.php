<?php
    include "bdd.php";

    $bdd = new BDD("localhost", "root", "", "z_tournament");

    // liste des ID
    /*$liste_equipes = array(
        $bdd->add_equipe("les Branquignols"),
        $bdd->add_equipe("ZCorp"),
        $bdd->add_equipe("AnnéciensPasContents"),
        $bdd->add_equipe("Les noobs"),
        $bdd->add_equipe("Lacrimatica"),
        $bdd->add_equipe("Pantoufle warrior"),
        $bdd->add_equipe("Barochettes"),
        $bdd->add_equipe("Les chocolatines"),
        $bdd->add_equipe("test1"),
        $bdd->add_equipe("test2")
    );*/
    /*$tournament_id = $bdd->add_tournoi("test_tournoi");*/
    $tournament_id = $_GET["id"];
    $equipes=$bdd->get_equipe_tournois_id($tournament_id);
    $tab=array();
    foreach ($equipes as $key => $values) {
        array_push($tab,$values[0]);
    }
    
    $bdd->set_liste_equipe($tab);
    $nb_equipe=count($equipes);
   
    

    //select distinct max(round_match) from `match` where id_tournoi = 1



    // En fonction du choix du form
    
    
    $round = $bdd->getFirstRoundId($tournament_id);
    $matchs = $bdd->get_matchs($round, $tournament_id);

    $tournament_format = array(2,4,8,16,32,64,128,264);

    $teams = array();
    global $teams;

    foreach ($matchs as $match) {

        $sub_teams = array();

        $equipe1 = $bdd->get_equipe($match[1])[1];
        $equipe2 = $bdd->get_equipe($match[2])[1];

        $sub_teams[] = $equipe1;
        $sub_teams[] = $equipe2;

        $teams[] = $sub_teams;
      
    }

    

    $teams_number = $bdd->get_equipes_number($tournament_id);

    $value = (getClosest($teams_number, $tournament_format) - $teams_number) / 2;

    for ($i = 0; $i < $value; $i++){
        $teams[] = [null, null];
    }

    $results = [];
    
    
    for ($i = $round; $i > 0; $i--){

        $current_round = $i;

        $matchs = $bdd->get_matchs($current_round, $tournament_id);

        $round_scores = array();

        foreach ($matchs as $match) {

            $matchs_scores = array();
            $score1 = (int) $match[3];
            $score2 = (int) $match[4];

            if(isset($score1)){
                $matchs_scores[] = $score1;
            }
            if(isset($score2)){
                $matchs_scores[] = $score2;
            }

            if(!empty($matchs_scores)){
                $round_scores[] = $matchs_scores;
            }
           
        }
        $results[] = $round_scores;

    }


    function getClosest($search, $arr) {
        $closest = null;
        foreach ($arr as $item) {
           if($search <= $item){
                if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                    $closest = $item;
                }
           }

         
        }
        return $closest;
     }


     $test=$teams;


    
?>



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

        <div class="tournament"></div>
        <br>
        <br>
        <br>
        <form action="tournament_tps_reel.php?id=<?php echo $tournament_id ?>" method="post">
                <form-panel id ="panel">
                    <form-header id="Formheader">
                        <h3>Actualiser le tournoi :</h3>
                    </form-header>

                    <form-content>
                    <form-group class="group">
                        <select name="match_select" id="match_select">
                                <option value="">Choisir un match</option>
                                <?php
                                $bdd=new BDD("localhost","root","","z_tournament");
                                $t = $bdd->get_all_matchs($tournament_id);
                                echo json_encode($teams);    
                                echo json_encode($results);                            
                                foreach ($t as $match) {
                                    $res=$bdd->get_equipe_name($match[1]);
                                    $res2=$bdd->get_equipe_name($match[2]);
                                    echo "<option value='" . $match[0] . "'>" . $res . " VS ".$res2." </option>\n";
                                }
                                
                                ?>
                            </select>
                        </form-group>

                        <form-group class="group">
                            <label for="nomTournoi">Score equipe 1 :</label>
                            <input type="number" name="s_eq1" id="s_eq1" min="0"/>
                        </form-group>

                        <form-group class="group">
                            <label for="nomTournoi">Score equipe 2 :</label>
                            <input type="number" name="s_eq2" id="s_eq2" min="0" />
                        </form-group>

                        <form-group class="group">
                            <input type="submit" name="btn7" value="Actuzliser" />
                        </form-group>
                    </form-content>
                </form-panel>

            </form>

    </div>
        


</div>


<script src="jquery.min.js"></script>
<script src="jquery.bracket.min.js"></script>
    <script>


        var minData = {

            teams : <?php echo json_encode($teams); ?>
            ,
            results : <?php echo json_encode($results); ?>

        }

        $('.tournament').bracket({
            init: minData
        });

    </script>    



</body>
</html>


<?php

if(isset($_POST["btn7"])){
    $bool=true;
    if (isset($_POST["match_select"]) && $_POST["match_select"] == "Choisir un match") {
        echo "Veuillez selectionner un match <br>";
        $bool = False;
    }
    if (isset($_POST["s_eq1"]) && $_POST["s_eq1"] == "") {
        echo "Veuillez mettre un score a l'equipe 1<br>";
        $bool = False;
    }

    if (isset($_POST["s_eq2"]) && $_POST["s_eq2"] == "") {
        echo "Veuillez mettre un score a l'equipe 2<br>";
        $bool = False;
    }

    if($bool){
       

        $bdd = new BDD("localhost", "root", "", "z_tournament");
        $bdd->update_match($_POST["match_select"],$_POST["s_eq1"],$_POST["s_eq2"]);
        header("Refresh");
    }
    
}

?>





