<?php 
session_start();
  include 'includes/header.php';
  include 'includes/topbar.php';
  include 'includes/sidebar.php';
  include 'config.php';
 ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Modal -->
<div class="modal fade" id="adicionarUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserir Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="codeProduto.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
          <label>Preço</label>
          <input type="number" step="any" class="form-control" name="preco" placeholder="Preço">
        </div>
        <div class="form-group">
          <label>Imagem</label>
          <input type="text" class="form-control" name="imagem" placeholder="Imagem">
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" name="adicionarUser" class="btn btn-primary">Gravar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Apagar User -->

  <!--User Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="codeProduto.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="delete_id" class="delete_user_id">
        <p>Tem a certeza que quer apagar o produto?</p>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" name="DeleteUserBtn" class="btn btn-primary">SIM , Apagar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
   <!-- /. Apagar User -->
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
              <li class="breadcrumb-item active">Produtos registados</li>
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

          <?php 
               if (isset($_SESSION['status'])) 
                  {
                      echo "<h4>". $_SESSION['status']. "<h4>";
                      unset($_SESSION['status']);
                  }
           ?>
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Produtos Registados</h3>
                <a href="#" data-toggle="modal" data-target="#adicionarUserModal" class="btn btn-primary btn-sm float-right">Inserir Produtos</a>
              </div>
          <!-- /.card-header -->
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Ação</th>                     
                  </tr>
                  </thead>
                  <tbody>
                    <!-- mostrar os users registados na bd -->
                    <?php 
                          $query = "select * from produtos";
                          $run = mysqli_query($con,$query);

                        //trazer todos os resultados para a tabela
                          if (mysqli_num_rows($run)>0) {
                            foreach ($run as $row) {
                              //echo $row['nome'];
                    ?>
                        <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['preco']; ?></td>
                        <td><?php echo $row['imagem']; ?></td>

                        <td> <a href="atualizarProduto.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm"> Atualizar</a>

                        <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm deleteBtn"> Apagar</button> </td>
                        
                        </tr>
                  

                    <?php
                    }
                  }

                      else
                      {
                  ?>
                    <tr>
                      <td>Sem resultados</td>
                  </tr>
                  <?php
                }
                ?>
                </tbody>
              </table>

              <a href="imprimirrelatorio_produtos.php" name ='pdfg' value='pdfg'class="btn btn-primary" > PDF </a>
     </div>
   </div>
    </div>
      </div>
    </div>
</section>

</div>
<?php include 'includes/script.php'; ?>

<script>

  $(document).ready(function(){

    $('.deleteBtn').click(function(e){

        e.preventDefault(); 

        var user_id = $(this).val();

        $('.delete_user_id').val(user_id);
        $('#DeleteModal').modal('show');
    });

  });

</script>
 <?php include 'includes/footer.php';  ?>