<?php 
session_start();
include 'config.php';


if (isset($_POST['adicionarUser'])) {
	
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$imagem = $_POST['imagem'];

	// inserir novo user
		$query = "insert into produtos (nome,preco,imagem)
			   values ('$nome','$preco','$imagem')	";

	$user_query_run = mysqli_query($con, $query);

	if ($user_query_run) {
		
		$_SESSION['status'] = "Produto adicionado com sucesso";
		header("Location: registarProduto.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao inserir Produto";
		header("Location: registarProduto.php");
	}


}


//atualizar Users

if (isset($_POST['atualizarProduto'])) {
	
	$user_id = $_POST['user_id'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$imagem = $_POST['imagem'];

	$query = "update produtos
			  set nome = '$nome',
			      preco = '$preco',
			  	  imagem = '$imagem'
			   where id = '$user_id'";

	$run = mysqli_query($con,$query);

	if ($run) {
		
		$_SESSION['status'] = "Produto atualizado com sucesso";
		header("Location: registarProduto.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao atualizar Produto";
		header("Location: registarProduto.php");
	}
}

//apagar Users


if (isset($_POST['DeleteUserBtn'])) {

	$uid = $_POST['delete_id'];
	
	$query= "delete from produtos where id = '$uid' ";

	$run = mysqli_query($con,$query);

		if ($run) {
		
		$_SESSION['status'] = "Produto eliminado com sucesso";
		header("Location: registarProduto.php");
	}

	else
	{
		$_SESSION['status'] = "Falha ao eliminar Produto";
		header("Location: registarProduto.php");
	}
}


 ?>