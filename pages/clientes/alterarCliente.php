<?php
require '../../database/actionsClientes.php';
$Cliente = getClienteID($_POST['id']);
?>
<!doctype HTML>
<html lang="pt_BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Alterar dados cliente</title>

  </head>
  <body>
    <div class="container" style="margin-top: 10px;" >
       
        <form action="../../database/actionsClientes.php" method="post" name="dadosCliente">
            <div class="form-row">
              
              <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="name" class="form-control"  name="nome" value="<?=$Cliente['Nome']?>" >
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$Cliente['Email']?>">
              </div>
            </div>
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" name="endereco" value="<?=$Cliente['Endereco']?>">
            </div>
         
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control"  name="cidade" value="<?=$Cliente['Cidade']?>">
              </div>
              <div class="form-group col-md-6">
                <label for="uf">UF</label>
                <input type="text" class="form-control" name="uf" value="<?=$Cliente['UF']?>">
              </div>
              
            </div>
            
            <input type="hidden" value="<?=$Cliente['ID']?>" name="id" />
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