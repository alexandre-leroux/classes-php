<?php

$link = mysqli_connect("localhost", "root", "root", "classes");

echo 'ruben';
$link->query("INSERT INTO utilisateurs ( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ( 'rere', 'fdghfg', 'dgfdgdfsrtgr', 'tdsdest', 'tesdqsdst')");
echo 'habib';


?>