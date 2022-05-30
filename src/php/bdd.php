<?php

class BDD
{
    private $conn;
    private $liste_equipe;

    public function __construct($host, $username, $pswd, $db)
    {
        $this->conn = new mysqli($host, $username, $pswd, $db);
        mysqli_set_charset($this->conn, 'utf8');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function set_liste_equipe($liste_equipe)
    {
        $this->liste_equipe = $liste_equipe;
    }

    // INTERNAL FUNCTIONS OF THE CLASS
    private function select($requete)
    {
        $result = $this->conn->query($requete);

        return $result;

    }

    private function insert($query)
    {
        if ($this->conn->query($query) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    private function update($query){
        if ($this->conn->query($query) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    private function delete($query){
        if ($this->conn->query($query) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    // ------------------------ INSERT FUNCTIONS ------------------------
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
        $this->insert($query);
        return $this->conn->insert_id;
    }

    public function add_tournoi_complet($nom_tournoi,$regle){
        $query = "INSERT INTO TOURNOI(nom_tournoi, regle_tournoi)
        VALUES('" . $nom_tournoi . "', '".$regle."')";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    function add_team_tournoi($id_team,$id_tournoi){
        $query = "INSERT INTO participer(id_equipe, id_tournoi)
        VALUES('" . $id_team . "', '".$id_tournoi."')";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    public function create_tree($nb_equipe, $id_tournoi, $type_match = "tree", $depth = 1, $id_parent_match = 'NULL')
        /*
         * Fonction de création de l'arbre
         * il faut d'abord appeler la fonction set_liste_equipe() avant cette fonction
         * paramètres :
         *  - nb_equipe : le nombre total d'equipe
         *  - id_tournoi : l'id du tournoi qui accueille les matchs
         *  - type_match : le type de match
         *  - depth : la profondeur actuelle de l'arbre, mettre de base a 0
         *  - id_parent_match : l'id du match parent
         */
    {
        // Si le niveau actuel est de taille superieure au nombre d'equipe
        if (pow(2, $depth) >= $nb_equipe) {
            if (count($this->liste_equipe) > 1) {
                // Ajout d'un match avec deux equipes
                $this->add_match(array_pop($this->liste_equipe), array_pop($this->liste_equipe), $id_parent_match, $depth, $type_match, $id_tournoi);
            }
            if (count($this->liste_equipe) == 1) {
                $this->add_match(array_pop($this->liste_equipe), NULL, $id_parent_match, $depth, $type_match, $id_tournoi);
            }
        } else {
            // Ajout des match intermediaires
            $parent_id = $this->add_empty_match($id_parent_match, $depth, $type_match, $id_tournoi);

            // Appel recursif de la fontion de creation de l'arbre
            $depth++;
            $this->create_tree($nb_equipe, $id_tournoi, $type_match, $depth, $parent_id);
            $this->create_tree($nb_equipe, $id_tournoi, $type_match, $depth, $parent_id);
        }
    }

    public function add_empty_match($id_parent_match, $round_match, $type_match, $id_tournoi)
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
        $query = "INSERT INTO `MATCH`(id_parent_match, round_match, type_match, id_tournoi)
                  VALUES(" . $id_parent_match . ", " . $round_match . ", '" . $type_match . "', " . $id_tournoi . ")";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    public function add_match($equipe1, $equipe2, $id_parent_match, $round_match, $type_match, $id_tournoi)
        /*
         * Ajoute un match à un tournoi
         * paramètres :
         *  - equipe1 : l'id de l'equipe 1
         *  - equipe2 : l'id de l'equipe 2
         *  - parent_match : l'id du match parent
         *  - type_match : le type de match (pool / tree)
         *  - id_tournoi : l'id du tournoi
         * retour:
         *  - l'id du match inséré dans la base de données
         */
    {
        $query = "INSERT INTO `MATCH`(equipe1_match, equipe2_match, id_parent_match, round_match, type_match, id_tournoi)
                  VALUES('" . $equipe1 . "', '" . $equipe2 . "', " . $id_parent_match . ", " . $round_match . ", '" . $type_match . "', " . $id_tournoi . ")";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    public function add_equipe($nom_equipe, $id_activite = 'NULL')
        /*
         * Ajoute une équipe
         * paramètres :
         *  - nom_equipe : le nom de l'équipe
         *  - id_activité : l'id de l'activité pratiquée par l'équipe
         * retour :
         *  - l'id de l'équipe insérée dans la base de données
         */
    {
        $query = "INSERT INTO `EQUIPE`(nom_equipe, id_activite)
                  VALUES('" . $nom_equipe . "', " . $id_activite . ")";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    public function add_player_to_team($id_participant, $id_equipe)
        /*
         * Ajoute un joueur à une équipe
         * paramètres :
         *  - id_participant : l'id du joueur
         *  - id_equipe : l'id de l'équipe
         */
    {
        $query = "INSERT INTO EST_MEMBRE (id_participant, id_equipe)
                  VALUES ('" . $id_participant . "'," . $id_equipe . ")";
        $this->insert($query);
    }

    public function add_player($pseudo_participant, $nom_participant, $prenom_participant)
        /*
         * Ajoute un joueur à la base de données
         * paramètres :
         *  - pseudo_participant : le pseudo du participant
         *  - nom_participant : le nom du participant
         *  - prenom_participant : le prénom du participant
         * retour :
         *  - l'id du participant ajouté à la base de données
         */
    {
        $query = "INSERT INTO PARTICIPANT (pseudo_participant, nom_participant, prenom_participant)
                  VALUES ('" . $pseudo_participant . "', '" . $nom_participant . "', '" . $prenom_participant . "')";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    function add_activite($nom_activite)
        /*
         * Ajoute une activité à la base données
         * paramètres :
         *  - nom_activite : le nom de l'activité
         * retour :
         *  - l'id de l'activité ajoutée à la base de données
         */
    {
        $query = "INSERT INTO ACTIVITE (nom_activite)
                VALUES ('" . $nom_activite . "')";
        $this->insert($query);
        return $this->conn->insert_id;
    }

    // ------------------------ SELECT FUNCTIONS ------------------------
    function get_activites()
        /*
         * Récupère la liste des activités
         * retour :
         *  - Un tableau de tableau contenant chacun respectivement l'id de l'activité et son nom
         */
    {
        $query = "SELECT id_activite, nom_activite FROM `ACTIVITE`";
        $res = $this->select($query);
        return $res->fetch_all();

    }

    public function get_equipes()
        /*
         * Récupère la liste des équipes inscrites dans la base de données
         * retour :
         *  - Un tableau de tableau contenant chacun respectivement l'id de l'équipe et son nom
         */
    {
        $query = "SELECT id_equipe, nom_equipe FROM `EQUIPE`";
        $res = $this->select($query);
        return $res->fetch_all();

    }

    public function get_equipes_number($tournament_id)
    {
        $first_round = $this->getFirstRoundId($tournament_id);
        $query = "SELECT count(id_match) as count FROM `match` 
        WHERE round_match = '".$first_round."'
        AND id_tournoi = ". $tournament_id;
        $res = $this->select($query);
        $row = $res->fetch_array();
        $count = $row["count"];
        return $count * 2;

    }

    public function get_membres()
        /*
         * Récupère la liste des participants
         * retour :
         *  - Un tableau de tableau contenant chacun respectivement l'id du participant son nom et son prénom
         */
    {
        $query = "SELECT id_participant, nom_participant, prenom_participant FROM `PARTICIPANT`";
        $res = $this->select($query);
        return $res->fetch_all();

    }

    public function get_tournois(){


        $query = "SELECT id_tournoi, nom_tournoi, regle_tournoi FROM `tournoi`";
        $res = $this->select($query);
        return $res->fetch_all();
    }

    public function get_matchs($round_match, $id_tournoi)
    {
        $query = "SELECT id_match, equipe1_match, equipe2_match, score_equipe1_match, score_equipe2_match, round_match, 
                  id_parent_match, type_match 
                  FROM `MATCH`
                  WHERE round_match = ". $round_match . " and id_tournoi = ". $id_tournoi;
        $res = $this->select($query);
        return $res->fetch_all();
    }

    public function get_all_matchs($id_tournoi){
        $query = "SELECT id_match, equipe1_match, equipe2_match, score_equipe1_match, score_equipe2_match, round_match, 
        id_parent_match, type_match 
        FROM `MATCH`
        WHERE id_tournoi = ". $id_tournoi."  and score_equipe1_match is NULL and score_equipe2_match is NULL";
        $res = $this->select($query);
        return $res->fetch_all();
    }

    public function get_equipe_name($id_equipe_temp){
        $query = "SELECT id_equipe,nom_equipe
        FROM equipe
        WHERE id_equipe='".$id_equipe_temp."'";
        $res = $this->select($query);
        $row=$res->fetch_array();
        return $row[1];
    }

    public function get_equipe($id_equipe) {
        $query = "SELECT id_equipe, nom_equipe 
                  FROM `EQUIPE`
                  WHERE id_equipe = ". $id_equipe;
        $res = $this->select($query);
        return $res->fetch_array();
    }

    public function get_tournoi($id_tournoi) {
        $query = "SELECT id_tournoi, nom_tournoi, regle_tournoi 
                  FROM `TOURNOI`
                  WHERE id_tournoi = ". $id_tournoi;
        $res = $this->select($query);
        return $res->fetch_array();
    }

    public function get_activite($id_activite) {
        $query = "SELECT id_activite, nom_activite  
                  FROM `ACTIVITE`
                  WHERE id_activite = ". $id_activite;
        $res = $this->select($query);
        return $res->fetch_array();
    }

    public function getFirstRoundId($tournament_id) {
        $query = "SELECT DISTINCT max(round_match) as round
                  FROM `MATCH` 
                  WHERE id_tournoi = ". $tournament_id;
        $res = $this->select($query);
        $row = $res->fetch_array();
        $round = $row["round"];
        return $round;
    }

    public function get_equipe_tournois_id($tournament_id){
        $query="SELECT p.id_equipe FROM
        equipe p
        JOIN participer pe ON p.id_equipe=pe.id_equipe
        WHERE pe.id_tournoi='".$tournament_id."'";
        $res=$this->select($query);
        
        $row = $res->fetch_all();
        
        
        return $row;

    }


    public function get_number_match_tournoi($tournament_id){
        $sql="SELECT * FROM `match` where id_tournoi=".$tournament_id."";
        
        $res=$this->select($sql);

        $row=$res->fetch_array();
        
        
        return $row;

    }



    /* UPDATE FUNCTIONS */

    public function  update_match($id_match,$score1,$score2){
        $query="SELECT id_parent_match from `match` where id_match=".$id_match."";
        $res=$this->select($query);
        $row = $res->fetch_all();
        $id_parent=$row[0][0];
        if($id_parent!=null){
            $query="UPDATE `match`
            SET score_equipe1_match=".$score1.",score_equipe2_match=".$score2." WHERE
            id_match=".$id_match."";
            $this->update($query);

            $gagnant=0;
    
            if($score1>$score2){
                $gagnant=$score1;
                $query="SELECT equipe1_match from `match` where id_match=".$id_match."";
            }else if($score1<$score2){
                $gagnant=$score2;
                $query="SELECT equipe2_match from `match` where id_match=".$id_match."";
            }

            $res=$this->select($query);
            $row = $res->fetch_all();
            $winner=$row[0][0];


            $query="SELECT equipe1_match,equipe2_match FROM `match` where id_match=".$id_parent."  ";
      
            $res=$this->select($query);
            $row = $res->fetch_array();

    
           


            if($row[0]==NULL && $row[1]==Null){
                    
                    $query="UPDATE  `match`
                    SET equipe1_match=".$winner." 
                    WHERE id_match=".$id_parent."";
            }
            elseif ($row[1]==NULL) {
           
                $query="UPDATE  `match`
                SET equipe2_match=".$winner." 
                WHERE id_match=".$id_parent."";
            }
            
            $this->update($query);

        }else{
            $query="UPDATE `match`
            SET score_equipe1_match=".$score1.",score_equipe2_match=".$score2." WHERE
            id_match=".$id_match."";
            $this->update($query);

            $gagnant=0;

        }


       
        

        return 0;

    }

    /* DELETE */
    public function delete_tournois($id_tournoi){
        $sql="DELETE FROM tournoi where id_tournoi =".$id_tournoi."";
        $this->delete($sql);
        $sql="DELETE FROM participer where id_tournoi =".$id_tournoi."";
        $this->delete($sql);
        $sql="DELETE FROM `match` 
        where id_tournoi =".$id_tournoi."";
        $this->delete($sql);

        
    }

}
?>