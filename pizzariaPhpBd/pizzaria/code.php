<?php 
session_start();
include 'config.php';


if (isset($_POST['adicionarUser'])) {
	
	$nome = $_POST['nome'];
	$morada = $_POST['morada'];
	$nif = $_POST['nif'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$confPass = $_POST['confPass'];

	// inserir novo user
		$query = "insert into clientes (nome, morada, nif, telefone, email, pass)
			   values ('$nome ','$morada','$nif','$telefone', '$email', '$password')";

	$user_query_run = mysqli_query($con, $query);

	if ($user_query_run) {
		
		$_SESSION['status'] = "Utilizador adicionado com sucesso";
		header("Location: registarUser.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao inserir Utilizador";
		header("Location: registarUser.php");
	}


}


//atualizar Users

if (isset($_POST['atualizarUser'])) {
	
	$user_id = $_POST['user_id'];
	$nome = $_POST['nome'];
	$morada = $_POST['morada'];
	$nif = $_POST['nif'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "update clientes
			  set nome = '$nome',
			  morada = '$morada',
			  nif = '$nif',
			  telefone = '$telefone',
			  email = '$email',
			  pass = '$password' 
			  where id = '$user_id'";

	$run = mysqli_query($con,$query);

	if ($run) {
		
		$_SESSION['status'] = "Utilizador atualizado com sucesso";
		header("Location: registarUser.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao atualizar Utilizador";
		header("Location: registarUser.php");
	}
}

//apagar Users


if (isset($_POST['DeleteUserBtn'])) {

	$uid = $_POST['delete_id'];
	
	$query= "delete from clientes where id = '$uid' ";

	$run = mysqli_query($con,$query);

		if ($run) {
		
		$_SESSION['status'] = "Utilizador eliminado com sucesso";
		header("Location: registarUser.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao eliminar Utilizador";
		header("Location: registarUser.php");
	}
}


 ?>