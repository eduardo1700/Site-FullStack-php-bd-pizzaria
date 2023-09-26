<?php 
session_start();
include 'config.php';


if (isset($_POST['adicionarUser'])) {
	
	$id_cliente = $_POST['id_cliente'];
	$id_produto = $_POST['id_produto'];
	$nome_cliente = $_POST['nome_cliente'];
    $nome_produto = $_POST['nome_produto'];
    $local = $_POST['local'];

	// inserir novo user
		$query = "insert into encomenda (id_cliente, id_produto, nome_cliente, nome_produto, local)
			   values ('$id_cliente','$id_produto','$nome_cliente','$nome_produto','$local')	";

	$user_query_run = mysqli_query($con, $query);

	if ($user_query_run) {
		
		$_SESSION['status'] = "Encomenda adicionada com sucesso";
		header("Location: registarEncomenda.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao inserir Encomenda";
		header("Location: registarEncomenda.php");
	}


}


//atualizar Users

if (isset($_POST['atualizarEncomenda'])) {
	
    $user_id = $_POST['user_id'];
	$id_cliente = $_POST['id_cliente'];
	$id_produto = $_POST['id_produto'];
	$nome_cliente = $_POST['nome_cliente'];
    $nome_produto = $_POST['nome_produto'];
    $local = $_POST['local'];

	$query = "update encomenda
			  set id_cliente = '$id_cliente',
                  id_produto = '$id_produto',
                  nome_cliente = '$nome_cliente'
                  nome_produto = '$nome_produto'
                  local = '$local'
			   where id = '$user_id'";

	$run = mysqli_query($con,$query);

	if ($run) {
		
		$_SESSION['status'] = "Encomenda atualizada com sucesso";
		header("Location: registarEncomenda.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao atualizar Encomenda";
		header("Location: registarEncomenda.php");
	}
}

//apagar Users


if (isset($_POST['DeleteUserBtn'])) {

	$uid = $_POST['delete_id'];
	
	$query= "delete from encomenda where id = '$uid' ";

	$run = mysqli_query($con,$query);

		if ($run) {
		
		$_SESSION['status'] = "Encomenda eliminada com sucesso";
		header("Location: registarEncomenda.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao eliminar Encomenda";
		header("Location: registarEncomenda.php");
	}
}


 ?>