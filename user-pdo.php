<?php



$user1 = new Userpdo(NULL, 'alexaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'password','email@email.fr','alex','leroux');
$user2 = new Userpdo(null, 'boris', 'password','email@email.fr','boris','stan');
$user3 = new Userpdo(null, 'jean', 'password','email@email.fr','jean','lelefevre');
$user4 = new Userpdo(null, 'arnold', 'password','email@email.fr','arnold','scwart');




$user1->getLogin();

$user1->getAllInfos() ;





class Userpdo{

    private $id;
    public  $login;
    public  $password;
    public  $email;
    public  $firstname;
    public  $lastname;

    public function __construct($id,$login, $password, $email, $firstname, $lastname)
        {
            $this->id = $id;
            $this->login = $login;
            $this->password = $password;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }

    public function connection_bdd()
        {
            try {
                 $bdd = new PDO('mysql:host=localhost;dbname=classes;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
            catch (Exception $e)
                {
            die('Erreur : ' . $e->getMessage());
                }

                return $bdd;
        }


    public function register(){
        
  

        $bdd = $this->connection_bdd();
        $requete = $bdd->prepare("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( :login,  :password, :email, :firstname, :lastname)");
        $requete->execute(array('login'=>$this->login,
                                'password'=>$this->password,
                                'email'=>$this->email,
                                'firstname'=>$this->firstname,
                                'lastname'=>$this->lastname,
                                ));

        $bdd = null;

    }


    public function connect(){
        $bdd = $this->connection_bdd();
        $requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $requete->execute(array('login'=>$this->login));
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        $this->id = $resultat['id'];
        $this->login = $resultat['login'];
        $this->email = $resultat['email'];
        $this->password = $resultat['password'];
        $this->firstname = $resultat['firstname'];
        $this->lastname = $resultat['lastname'];
        $bdd = null;
        if ($this->id != NULL )
        { return 1;}
        else {return 0;}
    }

    public function disconnect(){
        unset($this->id, $this->login, $this->email, $this->password, $this->firstname, $this->lastname ) ;
    }


    public function delete(){
        $bdd = $this->connection_bdd();
        $requete = $bdd->prepare("DELETE  FROM utilisateurs WHERE id =:id ");
        $requete->execute(array('id'=>$this->id));
        $bdd = null;
        $this->disconnect();
    }
    public function update(){
        $bdd = $this->connection_bdd();
  
       $requete = $bdd->prepare("UPDATE utilisateurs  SET login=:login, password=:password, email=:email, firstname=:firstname, lastname=:lastname  WHERE id = '$this->id' ");
       $requete->execute(array('login'=>$this->login,
                                'password'=>$this->password,
                                'email'=>$this->email,
                                'firstname'=>$this->firstname,
                                'lastname'=>$this->lastname,)) ;
        $bdd = null;
    }

    public function isConnected() 
    {

        if ($this->connect() == 1)
        {echo ' il est bien connecté';}
        else { echo ' is conenected failed';}
        
    }
    public function getAllInfos() 
    {
        $bdd = $this->connection_bdd();
        $this->connect();
        $bdd = null;
        
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




}

































?>