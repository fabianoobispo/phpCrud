<?php
require 'database.php';

if(isset($_POST['acao'])) {
  if ($_POST["acao"]=="inserir"){
    inserirProduto();
  }
  if ($_POST["acao"]=="alterar"){
    alterarProduto();
  }
  if ($_POST["acao"]=="excluir"){
    excluirProduto();
  }
}

function inserirProduto(){
$permitir = verificarCamposVazios();
if ($permitir == true) {
 
      $produto = array(
        'Produto' => $_POST['produto'],
        'Preco' => $_POST['preco'],
        'Quantidade' => $_POST['quantidade'],
        'Descricao' => $_POST['descricao'],
                
      );

      $grava = DBCreate('Produtos',$produto);

      header('Location:../pages/produtos/produtos.php');
   
  } else {
    echo "Ainda contem campos em branco";
  }
}

function alterarProduto(){
$permitir = verificarCamposVazios();
if ($permitir == true) {
 
      $produto = array(
        'Produto' => $_POST['produto'],
        'Preco' => $_POST['preco'],
        'Quantidade' => $_POST['quantidade'],
        'Descricao' => $_POST['descricao'],      
      );

      $altera = DBUpdate('Produtos', $produto, 'ID='.$_POST['id']);

      header('Location:../pages/produtos/produtos.php');
       
  } else {
    echo "Ainda contem campos em branco";
  }
}

function excluirProduto(){
  $exclui = DBDelete('Produtos', 'ID='.$_POST['id']);
  header('Location:../pages/produtos/produtos.php');
}

function getProdutoNoBanco() {
  return DBRead('Produtos','ORDER BY ID');
}

function getProdutoID($id) {
  $produto = DBRead('Produtos', 'WHERE ID='.$id);
  return $produto[0];
}

function verificarCamposVazios() {
  $produto = array(
    'produto' => $_POST['produto'],
    'preco' => $_POST['preco'],
    'quantidade' => $_POST['quantidade'],
    'descricao' => $_POST['descricao'],
   
  );
  foreach ($produto as $value) {
    if ($value == "") {
      return false;
    }
  }
  return true;
}




function formatoData($data) {
  $array = explode("-",$data);
  return $array2 = ($array[2]."/".$array[1]."/".$array[0]);
}
?>
