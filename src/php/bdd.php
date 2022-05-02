
<?php
 class BDD {

    private $host="localhost";
    private $username="root";
    private $pswd="";
    private $db="z_tournament";
    private $conn;


    public function __construct($host,$username,$pswd,$db){
        $this->conn=new mysqli($this->host, $this->username, $this->pswd, $this->db);
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