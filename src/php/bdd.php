
<?php
 class BDD {

    private $host;
    private $username;
    private $pswd;
    private $db;
    private $conn;


    public function __construct($host,$username,$pswd,$db){
        $this->conn=new mysqli($host, $username, $pswd, $db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select($requete){
        $result=$this->conn->query($requete);

        return $result;

    }

}



$bdd=new BDD("localhost","root","","z_tournament");
$requete="SELECT * from activite";

$res=$bdd->select($requete);

var_dump($res);


?>