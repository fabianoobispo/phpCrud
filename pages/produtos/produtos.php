<?php
  require '../../database/actionsProdutos.php';
  $produtos = getProdutoNoBanco();
?>
<!doctype HTML>
<html lang="pt_BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Produtos</title>

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
          <li class="nav-item active">
            <a class="nav-link" href="./produtos.php">Produtos</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="../../pages/vendas/vendas.php">Vendas</a>
          </li>        
        </ul>
      </div>
    </nav>



    <div class="container" style="margin-top: 10px;" >
       
        <form action="../../database/actionsProdutos.php" method="post" name="dadosproduto">
            <div class="form-row">
              
              <div class="form-group col-md-4">
                <label for="produto">Produto</label>
                <input type="name" class="form-control"  name="produto" >
              </div>
              <div class="form-group col-md-4">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" name="preco">
              </div>
              <div class="form-group col-md-4">
              <label for="quantidade">Quantidade</label>
              <input type="number" class="form-control" name="quantidade">
              </div>
            </div>
            
         
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="descricao">Descriçao</label>
                <input type="text" class="form-control"  name="descricao">
              </div>
              
              
            </div>
            <input type="hidden" value="inserir" name="acao"/>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            
          </form>
          

          <!-- verificar se tem dados na variavel produtos -->
          <?php if(is_array ($produtos) || is_object ($produtos) ) { ?>
          <!-- se tiver moastar produtos ja salvos  -->
          <div class="container" style="margin-top: 60px;" >
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Produto</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Em estoque</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Acão</th>
                </tr>
              </thead>

              <tbody>   
            <?php 
            foreach ($produtos as $produto) {?>
              <tr>                
                <td><?=$produto['Produto']?></td>
                <td><?=$produto['Preco']?></td>
                <td><?=$produto['Quantidade']?></td>
                <td><?=$produto['Descricao']?></td>               
                <td> 
                  <div style="display: flex; flex-direction:center;"  >
                    <form action="alterarproduto.php" name="alterar" method="POST">
                      <input type="hidden" name="id" value="<?=$produto['ID']?>" />
                      <button type="submit" class="btn btn-warning">alterar</button>
                    </form>
                
                    <form action="../../database/actionsProdutos.php" name="excluir" method="POST">
                      <input type="hidden" name="id" value="<?=$produto['ID']?>" />
                      <input type="hidden" value="excluir" name="acao" />
                      <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>                
                  </div>
                </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
            <?php} if else(!$produtos) { ?>
            
            <?php } else{ ?> 
              <div class="container" style="margin-top: 10px;" >
              <p class="text-uppercase text-center" >Sem produtos cadastrados.</p>
              
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