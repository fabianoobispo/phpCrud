<?php
require '../../database/actionsProdutos.php';
$Produto = getProdutoID($_POST['id']);
?>
<!doctype HTML>
<html lang="pt_BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Alterar dados do produto</title>

  </head>
  <body>
    <div class="container" style="margin-top: 10px;" >
       
        <form action="../../database/actionsProdutos.php" method="post" name="dadosProduto">
            <div class="form-row">
              
              <div class="form-group col-md-6">
                <label for="produto">Produto</label>
                <input type="name" class="form-control"  name="produto" value="<?=$Produto['Produto']?>" >
              </div>
              <div class="form-group col-md-6">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" name="preco" value="<?=$Produto['Preco']?>">
              </div>
            </div>
            <div class="form-group">
              <label for="quantidade">Quantidade</label>
              <input type="number" class="form-control" name="quantidade" value="<?=$Produto['Quantidade']?>">
            </div>
         
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="descricao">Descriçao</label>
                <input type="text" class="form-control"  name="descricao" value="<?=$Produto['Descricao']?>">
              </div>
              
              
            </div>
            
            <input type="hidden" value="<?=$Produto['ID']?>" name="id" />
            <input type="hidden" value="alterar" name="acao"/>

          <button type="submit" class="btn btn-primary">alterar</button>
            </div>
            
          </form>
          </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>