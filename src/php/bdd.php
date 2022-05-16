<?php


class BDD
{

    private $host;
    private $username;
    private $pswd;
    private $db;
    private $conn;


    public function __construct($host, $username, $pswd, $db)
    {
        $this->conn = new mysqli($host, $username, $pswd, $db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select($requete)
    {
        $result = $this->conn->query($requete);

        return $result;

    }

    private function insert_query($query)
    {
        if ($this->conn->query($query) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    public function add_tournoi($nom_tournoi)
        /*
         * Ajout d'un tournoi
         * paramètres :
         *  - nom_tournoi
         * retour :
         *  - l'id du tournoi inséré dans la base de données
         */
    {
        $query = "INSERT INTO TOURNOI(nom_tournoi, regle_tournoi)
                VALUES('" . $nom_tournoi . "', NULL)";
        $this->insert_query($query);
        return $this->conn->insert_id;
    }

    public function create_tree($liste_equipe, $nb_equipe, $id_tournoi, $type_match = "tree", $depth = 0, $id_parent_match = 'NULL')
        /*
         * Fonction de création de l'arbre
         * paramètres :
         *  - liste_equipe : la liste des ID d'equipe participant au tournoi
         *  - nb_equipe : le nombre total d'equipe
         *  - id_tournoi : l'id du tournoi qui accueille les matchs
         *  - type_match : le type de match
         *  - depth : la profondeur actuelle de l'arbre, mettre de base a 0
         *  - id_parent_match : l'id du match parent
         */
    {
        // Si le niveau n+1 est de taille superieure au nombre d'equipe
        if (pow(2, $depth + 1) >= $nb_equipe) {
            echo print_r($liste_equipe);
            if (count($liste_equipe) > 1) {
                // Ajout d'un match avec deux equipes
                $this->add_match(array_pop($liste_equipe), array_pop($liste_equipe), $id_parent_match, $type_match, $id_tournoi);
            }
            if (count($liste_equipe) == 1) {
                $this->add_match(array_pop($liste_equipe), NULL, $id_parent_match, $type_match, $id_tournoi);
            }
            return $liste_equipe;
        } else {
            $depth++;
            // Ajout des match intermediaires
            $parent_id = $this->add_empty_match($id_parent_match, $type_match, $id_tournoi);

            // Appel recursif de la fontion de creation de l'arbre
            $liste_equipe = $this->create_tree($liste_equipe, $nb_equipe, $id_tournoi, $type_match, $depth, $parent_id);
            $this->create_tree($liste_equipe, $nb_equipe, $id_tournoi, $type_match, $depth, $parent_id);
        }
    }

    public function add_empty_match($parent_match, $type_match, $id_tournoi)
        /*
         * Ajoute un match vide à un tournoi
         * paramètres :
         *  - parent_match : l'id du match parent
         *  - type_match : le type de match (pool / tree)
         *  - id_tournoi : l'id du tournoi
         * retour:
         *  - l'id du match inséré dans la base de données
         */
    {
        $query = "INSERT INTO `MATCH`(parent_match, type_match, id_tournoi)
                  VALUES(" . $parent_match . ", '" . $type_match . "', " . $id_tournoi . ")";
        $this->insert_query($query);
        return $this->conn->insert_id;
    }

    public function add_match($equipe1, $equipe2, $parent_match, $type_match, $id_tournoi)
        /*
         * Ajoute un match à un tournoi
         * paramètres :
         *  - equipe1 : l'id de l'equipe 1
         *  - equipe2 : l'id de l'equipe 2
         *  - parent_match : l'id du match parent
         *  - type_match : le type de match (pool / tree)
         *  - id_tournoi : l'id du tournoi
         * retour:
         *  - l'id du match insérée dans la base de données
         */
    {
        $query = "INSERT INTO `MATCH`(equipe1_match, equipe2_match, parent_match, type_match, id_tournoi)
                  VALUES('" . $equipe1 . "', '" . $equipe2 . "', " . $parent_match . ", '" . $type_match . "', " . $id_tournoi . ")";
        $this->insert_query($query);
        return $this->conn->insert_id;
    }

    public function add_equipe($nom_equipe, $id_activite = 'NULL')
        /*
         * Ajoute une equipe
         * paramètres :
         *  - nom_equipe : le nom de l'équipe
         *  - id_activité : l'id de l'activité pratiquée par l'équipe
         * retour :
         *  - l'id de l'équipe insérée dans la base de données
         */
    {
        $query = "INSERT INTO `EQUIPE`(nom_equipe, id_activite)
                  VALUES('" . $nom_equipe . "', " . $id_activite . ")";
        $this->insert_query($query);
        return $this->conn->insert_id;
    }
}
?>