<?php
include "bdd.php";

$bdd = new BDD("localhost", "root", "password", "TOURNOIS");

// liste des ID
$liste_equipes = array(
    $bdd->add_equipe("les Branquignols"),
    $bdd->add_equipe("ZCorp"),
    $bdd->add_equipe("AnnéciensPasContents"),
    $bdd->add_equipe("Les noobs")
);

$tournament_id = $bdd->add_tournoi("test_tournoi");

$bdd->create_tree($liste_equipes, 4, $tournament_id);
?>