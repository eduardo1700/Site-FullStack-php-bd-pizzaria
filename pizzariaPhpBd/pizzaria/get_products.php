<?php
include('config.php'); 


$sql = "SELECT id, nome, preco, imagem FROM produtos";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $products = array(); 
}

mysqli_close($con);
?>
