
<?php




class User 

{
    private $id;
    public  $login;
    public  $password;
    public  $email;
    public  $firstname;
    public  $lastname;

    // public function __construct($login, $password, $email, $firstname, $lastname)
    //     {

   
    //         $this->login = $login;
    //         $this->password = $password;
    //         $this->email = $email;
    //         $this->firstname = $firstname;
    //         $this->lastname = $lastname;

    //     }

        public function connection_bdd()
            {

                $connection = mysqli_connect("localhost", "root", "root", "classes");

                /* Vérification de la connexion */
                if (mysqli_connect_errno()) {
                    printf("Échec de la connexion : %s\n", mysqli_connect_error());
                    exit();
                }
                else { echo ' connection à la bdd ok <br>';}

                return $connection;
            }



        public function register($login, $password, $email, $firstname, $lastname)
            {
                
                $bdd = $this->connection_bdd();
            
            if( $requete = $bdd->query("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( '$login',  '$password', '$email', '$firstname', '$lastname')"))
                { echo ' enregistrement de l\'utilisateur ok <br>';}
            else{ echo ' l\'enregistremnt de l\'utilisateur a echoué';}
                
                mysqli_close($bdd);

            }




        public function connect($login, $password) 

            {

                $bdd = $this->connection_bdd();
    

                $requete = $bdd->query("SELECT * FROM utilisateurs WHERE login = '$login' ");

                $donnees_utilisateur = $requete->fetch_assoc();
                mysqli_close($bdd );

                  if (  $donnees_utilisateur['password'] == $password)
                {
                    echo ' vous êtes connecté <br>';

                    echo '<pre>';
                    var_dump($donnees_utilisateur);
                    echo '</pre>';
                    
                    return  $donnees_utilisateur;
               
                }
                else { echo ' pas connecte <br>'; }
       
            

            }




        public function disconnect()

            {
      
                var_dump($this->id,$this->login,$this->email,$this->password,$this->firstname, $this->lastname );
                 unset($this->id,$this->login,$this->email,$this->password,$this->firstname, $this->lastname ) ;
                 var_dump($this->id,$this->login,$this->email,$this->password,$this->firstname, $this->lastname );
          
                
  
                echo ' vous avez été déconnecté';

            }



        public function delete()

            {

                $bdd = $this->connection_bdd();
                var_dump($this->login);
                $requete = $bdd->query("DELETE  FROM utilisateurs WHERE login = '$this->login' ");
                // $donnees_utilisateur = $requete->fetch_assoc();
                // $donnees_utilisateur = $requete->fetch_assoc();
                mysqli_close($bdd);


                // $this->disconnect();

                echo ' vous avez été deconecté et supprimé';

            }
       

        public function update($login, $password, $email, $firstname,$lastname)
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();
                    $requete = $bdd->query("UPDATE utilisateurs  SET login='$login', password='$password', email='$email' , firstname='$firstname', lastname='$lastname'  WHERE id = '$this->id' ");

                }


        public function isConnected() 
                {

                    if ($this->connect($i) == 2)
                    {echo ' il est bien connecté';}
                    else { echo ' is conenected failed';}
                    
                }

        public function getAllInfos() 
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();

                    
                    echo '<pre>';
                    var_dump($this);
                    echo '</pre> ';
                    
                }

        public function getLogin() 
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();


                    echo '<pre>';
                    var_dump($this->login);
                    echo '</pre> ';
                    
                }

                public function refresh() 
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();


                    echo '<pre>';
                    var_dump($this->login);
                    echo '</pre> ';
                    
                }  
}

// $user1 = new user(null, "alex", 'password', 'le@gr.fr', 'alexandre','leroux');

// $user1 = new user();

// $user2->register();

// $user1->connect();
// $user2->connect();
// $user2->delete();

// echo 'la session id est : '.$_SESSION['login']. '<br>';





?>