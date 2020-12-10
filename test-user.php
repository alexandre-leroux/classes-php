<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="accueil.css" />
    <title>WORK IN PROGRESS</title>
</head>


<body>


<?php


require 'user.php';







$user1 = new User();

$login = $user1->login = 'jean';
$password = $user1->password=  'password';
$email = $user1->email= 'email';
$firstname = $user1->firstname=  'first';
$lastname = $user1->lastname = 'last';

// $user1->register($login,$password,$email,$firstname,$lastname);

$user1->connect($login, $password);

// var_dump($connect);


$user1->disconnect();

// $user1->delete();







// var_dump($user1);





$user3 = new User($login ='jnnnn',$password = 'password');
// $user3->register($login,$password);

// $user2->login = 'boris';
// $user2->password = 'password';
// $user2->email = 'email';
// $user2->firstname = 'boris-1';
// $user2->lastname = 'laboris-2';
// $user2->register();







// $user2->register();
// $user3->register();
// $user4->register();


// $user1->isConnected();

// $user1->getAllInfos();
// $user1->register();


// $i = $user2->connect($login,$password);
// var_dump($i);


// $user1->update('jean', 'password','email@email.fr','jean','lelefevre') ;
// $user1->disconnect();
// $user1->delete();

























?>

</body>

























    



</html>