<?php

$user1 = new Lpdo();

$host = $user1->host = 'localhost';
$username = $user1->username=  'root';
$password = $user1->password= 'root';
$db = $user1->db=  'classes';


// $user1->register();
// $user1->constructeur();
// $user1->connect();
// $user1->getLastQuery();
// $user1->getLastResult();


// $user1->getTables() ;
$user1->getFields() ;


class Lpdo{

    
    public  $host;
    public  $username;
    public  $password;
    public  $db;


    public function constructeur()
    {
        $connection = mysqli_connect("$this->host", "$this->username", "$this->password", "$this->db");

                /* Vérification de la connexion */
                if (mysqli_connect_errno()) {
                    printf("Échec de la connexion : %s\n", mysqli_connect_error());
                    exit();
                }
                else { echo ' connection à la bdd ok <br>'; $this->connected = 1; $this->lastquery = 'La dernière requete est constructeur'; }

                return $this->result_query = $connection;
    }

    public function connect()
        {
            if ( isset($this->connected )){unset($connection); echo ' connexion bdd fermée  <br>';}

            $connection = mysqli_connect("$this->host", "$this->username", "$this->password", "$this->db");

                /* Vérification de la connexion */
                if (mysqli_connect_errno()) {
                    printf("Échec de la connexion : %s\n", mysqli_connect_error());
                    exit();
                }
                else { echo ' connection à la bdd ok <br>'; $this->connected = 1; $this->lastquery = 'La dernière requete est connect';}
                $this->result_query = $connection;
                return $connection;
        }

        public function destructeur()
        {
            if ( isset($this->connected )){unset($connection); echo ' connexion bdd fermée  <br>';}

        }
        public function close()
        {
            if ( isset($this->connected )){unset($connection); echo ' connexion bdd fermée  <br>';}

        }
        public function getLastQuery()
        {
            if ( isset($this->lastquery )){ echo $this->lastquery;}
            else { echo 'false';}

        }
        public function getLastResult()
        {
            if ( isset($this->result_query )){ echo 'le résultat de la dernière requete est :'; echo '<pre>'; var_dump($this->result_query);echo '</pre>';}
            else { echo 'false';}

        }

        public function getTables()
        {
            $bdd = $this->constructeur();

            $requete = $bdd->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE' ");

            $donnees_utilisateur = $requete->fetch_assoc();
            echo '<pre>';
            var_dump($donnees_utilisateur);
            echo '</pre>';

            mysqli_close($bdd );

        }
        
        public function getFields()
        {
            $bdd = $this->constructeur();

            $requete = $bdd->query("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'utilisateurs' ");

            $donnees_utilisateur = $requete->fetch_all();
            echo '<pre>';
            var_dump($donnees_utilisateur);
            echo '</pre>';

            mysqli_close($bdd );

        }

}

































?>