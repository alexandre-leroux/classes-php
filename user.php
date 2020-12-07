<?php











class user 
{


    private $id;
    public  $login;
    public  $email;
    public  $password;
    public  $firstname;
    public  $lastname;

    public function __construct($id, $login, $password, $email, $firstname, $lastname)
        {

            $this->id = $id;
            $this->login = $login;
            $this->email = $email;
            $this->password = $password;
            $this->firstname = $firstname;
            $this->lastname = $lastname;

        }

        public function register()
        {
            $link = mysqli_connect("localhost", "root", "root", "classes");

            /* Vérification de la connexion */
            if (mysqli_connect_errno()) {
                printf("Échec de la connexion : %s\n", mysqli_connect_error());
                exit();
            }
            else { echo ' connect ok';}
            
            $res = $link->query("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( '$this->login',  '$this->email',  '$this->password', '$this->firstname', '$this->lastname')");
            
            mysqli_close($link);


        }


}


$user1 = new user(null, "alex", 'lllll', 'ttttt', 'ccccccc','yyyyyyyy');

$user1->register();







?>