<!DOCTYPE html>
<?php include('get_products.php'); ?>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
        
        body{
            background-image: url(logo.jpg);
            background-size:300px;
            background-repeat:repeat;
        }
        
        .jumbotron.text-center{
            background-color: rgba(255,255,255,0);
            border-radius:90px;
            
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        
      }
      .card.mb-4.shadow-sm{
        width: 85%;
        border-style: solid;
        
      }
      .home{
            
            width:70px;
            height:40px;
            border-radius: 20px;
            background-color: rgb(221, 26, 50);
            border-style: none;
            color:White;
            cursor:pointer;
            font-size:25px;
            font-weight:bolder;
            
        }
        .home:hover{
            opacity: 0.7;
        }


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .btn.btn-sm.btn-outline-secondary{
        background-color: pink;
      }
      .btn.btn-primary.my-2{
        background-color:green;
      }
      .btn.btn-secondary.my-2{
        background-color: rgb(221, 26, 50);
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body>
  <main role="main">
    <section class="jumbotron text-center">
      <div class="container">
        <button type="button" class="home" onclick="location.href='principal.html'">&larr;</button>
        <h1>Menu</h1>
        <p class="lead text-muted"></p>
      </div>
    </section>

    <div class="fundo">
      <div class="container">
        <div class="row">
          <?php foreach ($products as $product) { ?>
            <div class="col-md-4">
              <form action="order_process.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <div class="card mb-4 shadow-sm">
                  <img src="<?php echo $product['imagem']; ?>" width="100%" height="100%">
                  <div class="card-body">
                    <p class="card-text"><?php echo $product['nome']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Encomendar</button>
                      </div>
                      <small class="text-muted"><?php echo number_format($product['preco'], 2); ?>€</small>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>

  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Voltar para cima</a>
      </p>
      <p>Entrega em 15 minutos garantida</p>
    </div>
  </footer>
</body>
</html>