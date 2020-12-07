<?php





$link = mysqli_connect("localhost", "root", "root", "classes");

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
else { echo ' connect ok';}

$res = $link->query("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( 'ruben', 'fdghfg', 'dgfdgdfsrtgr', 'tdsdest', 'tesdqsdst')");

mysqli_close($link);






class user 
{
    private $id;
    public  $login;
    public  $email;
    public  $firstname;
    public  $lastname;

    public function __construct($id, $login, $email, $firstname, $lastname)
        {

            $this->id = $id;
            $this->login = $login;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;

        }




}











?>