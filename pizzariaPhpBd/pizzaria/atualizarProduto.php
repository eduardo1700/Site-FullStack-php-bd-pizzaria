<?php
session_start();
    include 'includes/header.php';
    include 'includes/topbar.php';
    include 'includes/sidebar.php';
    include 'config.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Atualizar Produtos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <!-- /.content-header -->
<section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Atualizados Produtos </h3>
                <a href="registarProduto.php"  class="btn btn-danger btn-sm float-right">Voltar</a>
              </div>
          <!-- /.card-header -->

              
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <form action="codeProduto.php" method="POST">
                <div class="modal-body">

        
        <?php    //vai buscar os user à bd, user o parametro passado na url

        if (isset($_GET['user_id'])) {
             
                $user_id =$_GET['user_id'];
                $query="select * from produtos where id ='$user_id' limit 1";
                $run = mysqli_query($con,$query);
        

        //enquanto houver linhas na tabela (bd)
            
        if (mysqli_num_rows($run) >0) {
                              
            foreach ($run as $row) {
        ?>
        <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
        
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" value="<?php echo $row['nome'] ?>" class="form-control" placeholder="Nome">   
        </div>
        <div class="form-group">
          <label>Preço</label>
          <input type="text" step="any" name="preco" value="<?php echo $row['preco'] ?>" class="form-control" placeholder="Preço">   
        </div>
        <div class="form-group">
          <label>Imagem</label>
          <input type="text" name="imagem" value="<?php echo $row['imagem'] ?>" class="form-control" placeholder="Imagem">   
        </div>

        <?php 
        }
        }
        else
        {
                            echo "<h4>Sem dados</h4>";
             } 
         }

         ?>
        

      </div>
      <div class="modal-footer">
        
        <button type="submit" name="atualizarProduto" class="btn btn-info">Atualizar</button>
    </div>
        </form>
    </div>               
  </div>
 </div>
   </div>
    </div>
      </div>
    </div>
</section>





</div>

<?php

include 'includes/script.php';
include 'includes/footer.php';

?>