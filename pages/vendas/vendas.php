<?php
  require '../../database/actionsVendas.php';
  $vendas = getVendasNoBanco();
  $produtos = getProdutoNoBanco();
  $clientes = getClientesNoBanco();

  


?>
<!doctype HTML>
<html lang="pt_BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>





    <title>Vendas</title>

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../../index.html">Sistema cadastro</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="../../index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/clientes/clientes.php">Clientes</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../pages/produtos/produtos.php">Produtos</a>
          </li>  
          <li class="nav-item"active>
            <a class="nav-link" href="./vendas.php">Vendas</a>
          </li>        
        </ul>
      </div>
    </nav>



    <div class="container" style="margin-top: 10px;" >
       
        <form action="../../database/actionsVendas.php" method="post" name="dadosvendas">
            <div class="form-row">

            

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label label class="input-group-text" for="inputGroupSelect01">Produto</label>
              </div>

              <select class="custom-select"  data-live-search="true" name="produtoid" >
                <option selected>Escolha...</option>
                  <?php  foreach ($produtos as $produto) {?>
                    <option value="<?=$produto['ID']?>"><?=$produto['Produto']?></option>
                  <?php } ?>
              </select>

              <div class="input-group-prepend">
                <label label class="input-group-text" for="inputGroupSelect01">Cliente</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="clienteid">
                <option selected>Escolha...</option>
                  <?php foreach ($clientes as $cliente) {?>
                    <option value="<?=$cliente['ID']?>"><?=$cliente['Nome']?></option>
                  <?php } ?>
              </select>
            </div>


         
              

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="quantidadevenda">Quantidade</label>
                <input type="number" class="form-control"  name="quantidadevenda" required>
              </div>
            </div>
            
           
              <div class="form-group col-md-12">
            <input type="hidden" value="inserir" name="acao" required/>
          <button type="submit" class="btn btn-primary">Vender</button>
          </div>
            </div>
              
            
          </form>
          

          <!-- verificar se tem dados na variavel produtos -->
          <?php if(is_array ($vendas) || is_object ($vendas) ) { ?>
          <!-- se tiver moastar produtos ja salvos  -->
          <div class="container" style="margin-top: 60px;" >
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Produto</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Valor total</th>
                </tr>
              </thead>

              <tbody>   
            <?php 
            foreach ($vendas as $venda) {?>
              <tr>                
             
                <td><?=$venda['Produto']?></td>              
                <td><?=$venda['NomeCliente']?></td>
                <td><?=$venda['Quantidade']?></td>
                <td><?=$venda['Preco']?></td>              
                <td><?=$venda['Quantidade'] * $venda['Preco']?></td>   
            </tr>
            <?php } ?>
          </tbody>
        </table>
            <?php} if else(!$vendas) { ?>
            
            <?php } else{ ?> 
              <div class="container" style="margin-top: 10px;" >
              <p class="text-uppercase text-center" >Sem Vendas realizadas.</p>
              
            </div>
            <?php } ?>
              
       
          </div>
    </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>