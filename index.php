<?php

include('conexao.php');


?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.png">
    <link rel="icon" type="image/png" href="./assets/img/logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>devTest</title>
  </head>
  <body class="">

<header>
  <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed shadow-sm" >
      <div class="container">
      <a class="navbar-brand" href="#">
      <img src="./assets/img/logo.png" alt="" width="30" height="24">
      </a>
      <a class="navbar-brand" href="#">Vendarro LTDA</a>
      </div>
    </nav>
  <!--navbar_end-->   
  </header>


  <!--main-->

  <section class=" h-100">
      <div class="container my-3">
      <div class="row justify-content-center  ">
          <div class="col-lg-6">
              
    <form action="" method="get">
      <div class="form">
      <input class="form-control img-input" name="busca" type="search" placeholder="Encontre seu novo carro..." aria-label="Search">
      <div class="text-center">
      </div>
    </div>
   </form>
       </div> 
        </div>
        </div>
  


        
  <!--php-->
  <?php
  if (!isset($_GET['busca'])) {

  } else {
      $pesquisa = $mysqli->real_escape_string($_GET['busca']);
      $sql_code = "SELECT *
          FROM carros
        
          WHERE nome LIKE '%$pesquisa%' 
          OR marca LIKE '%$pesquisa%'
          OR foto LIKE '%$pesquisa%'
          OR preco LIKE '%$pesquisa%'
          
          ";
      $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
      
      if ($sql_query->num_rows == 0) {
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col text-center">
                <h5>Nenhum resultado encontrado...</h5>
              </div>
            </div>
          </div>
      <?php
      } else {

        ?> 
        <div class="container ">      
<div class="card shadow-sm mb-4">        
<div class="card-body ">
  <div class="row g-3">
       
          
            <div class="col-lg-12">
            <h5>Carros encontrados:</h5>
            </div>
          
        
            
         
      

        <?php
          while($dados = $sql_query->fetch_assoc()) {
              ?>
                <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="card h-100  bg-light p-2 ">
                       <img src="<?php echo $dados['foto']; ?>" class="card-img rounded-2" alt="imagem dos carros">
                        <div class="card-body px-0">
                          <h5 class="card-title "><?php echo $dados['nome']; ?></h5>
                          <h5 class="position-absolute bottom-0 mx-2 end-0">$<?php echo $dados['preco']; ?></h5>
                        </div>
                      </div>
                </div>
              <?php

          }
      }
      ?>
  <?php
  } ?>
<!--php_end-->
                
              </div>
              </div>
            </div>
    </div>
    </section>  






</div>








  <!--main_end-->

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>