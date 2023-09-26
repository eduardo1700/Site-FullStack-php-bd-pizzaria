<?php

$host ='localhost';
$username = 'root' ;
$password = '' ;
$database = 'pizzaria' ;

//ligaçao

$con = mysqli_connect($host, $username, $password, $database );

//verificar ligação

if (!$con) {
   
   // header("Location:../errors/db.php");
    die();
    
    //die(mysqli_connect_error($con));
}

/*
else {
    echo 'sucesso';
}
*/
?>