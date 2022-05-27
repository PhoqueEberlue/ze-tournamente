<?php
include "bdd.php";

$bdd = new BDD("localhost", "root", "", "zetournamente");

// liste des ID
$liste_equipes = array(
    $bdd->add_equipe("les Branquignols"),
    $bdd->add_equipe("ZCorp"),
    $bdd->add_equipe("AnnéciensPasContents"),
    $bdd->add_equipe("Les noobs"),
    $bdd->add_equipe("Lacrimatica"),
    $bdd->add_equipe("Pantoufle warrior"),
    $bdd->add_equipe("Barochettes"),
    $bdd->add_equipe("Les chocolatines")
);

$tournament_id = $bdd->add_tournoi("test_tournoi");

$bdd->set_liste_equipe($liste_equipes);
$bdd->create_tree(8, $tournament_id);
?>