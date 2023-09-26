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
              <li class="breadcrumb-item active">Atualizar Encomendas</li>
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
                <h3 class="card-title">Atualizadas Encomendas </h3>
                <a href="registarEncomenda.php"  class="btn btn-danger btn-sm float-right">Voltar</a>
              </div>
          <!-- /.card-header -->

              
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <form action="codeEncomenda.php" method="POST">
                <div class="modal-body">

        
        <?php    //vai buscar os user à bd, user o parametro passado na url

        if (isset($_GET['user_id'])) {
             
                $user_id =$_GET['user_id'];
                $query="select * from encomenda where id ='$user_id' limit 1";
                $run = mysqli_query($con,$query);
        

        //enquanto houver linhas na tabela (bd)
            
        if (mysqli_num_rows($run) >0) {
                              
            foreach ($run as $row) {
        ?>
        <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
        
        <div class="form-group">
            <label>ID Cliente</label>
            <input type="number" name="id_cliente" value="<?php echo $row['id_cliente'] ?>" class="form-control" placeholder="ID Cliente">   
        </div>
        <div class="form-group">
            <label>ID Produto</label>
            <input type="number" name="id_produto" value="<?php echo $row['id_produto'] ?>" class="form-control" placeholder="ID Produto">   
        </div>
        <div class="form-group">
            <label>Cliente</label>
            <input type="text" name="nome_cliente" value="<?php echo $row['nome_cliente'] ?>" class="form-control" placeholder="Cliente">   
        </div>
        <div class="form-group">
            <label>Produto</label>
            <input type="text" name="nome_produto" value="<?php echo $row['nome_produto'] ?>" class="form-control" placeholder="Produto">   
        </div>
        <div class="form-group">
            <label>Local</label>
            <input type="text" name="local" value="<?php echo $row['local'] ?>" class="form-control" placeholder="Local">   
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
        
        <button type="submit" name="atualizarEncomenda" class="btn btn-info">Atualizar</button>
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