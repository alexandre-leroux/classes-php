
<?php




class User 

{
    private $id;
    public  $login;
    public  $password;
    public  $email;
    public  $firstname;
    public  $lastname;



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



        public function register()
            {
                
                $bdd = $this->connection_bdd();
            
            if( $requete = $bdd->query("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( '$this->login',  '$this->password', '$this->email', '$this->firstname', '$this->lastname')"))
                { echo ' enregistrement de l\'utilisateur ok <br>';}
            else{ echo ' l\'enregistremnt de l\'utilisateur a echoué';}
                
                mysqli_close($bdd);

            }




        public function connect() 

            {

                $bdd = $this->connection_bdd();
    

                $requete = $bdd->query("SELECT * FROM utilisateurs WHERE login = '$this->login' ");

                $donnees_utilisateur = $requete->fetch_assoc();
                mysqli_close($bdd );

                  if (  $donnees_utilisateur['password'] == $this->password)
                {
                    echo ' vous êtes connecté <br>';
                    $this->id = $donnees_utilisateur['id'] ;
                    echo '<pre>';
                    var_dump($donnees_utilisateur);
                    echo '</pre>';
                    $this->isconnect=1;
                    return  $donnees_utilisateur;
               
                }
                else { echo ' pas connecte <br>'; }
       
            

            }




        public function disconnect()

            {
      
                var_dump($this->id,$this->login,$this->email,$this->password,$this->firstname, $this->lastname );
                 unset($this->id,$this->login,$this->email,$this->password,$this->firstname, $this->lastname ) ;

          
                
  
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
       

        public function update()
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();
                    var_dump($this);
                   if( $requete = $bdd->query("UPDATE utilisateurs  SET login='$this->login', password='$this->password', email='$this->email' , firstname='$this->firstname', lastname='$this->lastname'  WHERE id = '$this->id' "))
                    {echo 'update ok';}
                    else  {echo 'update pas ok';}
                 }


        public function isConnected() 
                {

                    if ($this->isconnect == 1)
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
         public function getLemail() 
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();
          
          
                    echo '<pre>';
                    var_dump($this->email);
                    echo '</pre> ';
                    
                }
         public function getLFirstname() 
                {
                    $bdd = $this->connection_bdd();
                    $this->connect();
          
          
                    echo '<pre>';
                    var_dump($this->firstname);
                    echo '</pre> ';
                    
                }        
         public function getLastname() 
               {
                   $bdd = $this->connection_bdd();
                   $this->connect();
         
         
                   echo '<pre>';
                   var_dump($this->Lastname);
                   echo '</pre> ';
                   
               }
        public function refresh() 
               {
                   $bdd = $this->connection_bdd();
                   $donnees_utilisateur = $this->connect();
         
         
                    $this->login = $donnees_utilisateur['login'];
                    $this->password=  $donnees_utilisateur['password'];
                    $this->email= $donnees_utilisateur['email'];
                    $this->firstname=  $donnees_utilisateur['firstname'];
                    $this->lastname = $donnees_utilisateur['lastname'];

               }  
}


$user1 = new User();

$user1->login = 'junior';
$user1->password=  'password';
$user1->email= 'email';
$user1->firstname=  'first';
$user1->lastname = 'last';

// $user1->register();
// $user1->connect();
// $user1->disconnect();
// $user1->delete();
// $user1->update();
// $user1->isConnected();
// $user1->getAllInfos();
// $user1->getLogin() ;
// $user1->refresh() ;



?>