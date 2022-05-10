
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

    public function insert($requete){
        if ($this->conn->query($requete) === FALSE) {
            echo "Error: " . $requete . "<br>" . $conn->error;
          }
    }

}






?>