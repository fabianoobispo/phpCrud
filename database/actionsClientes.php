<?php
require 'database.php';

if(isset($_POST['acao'])) {
  if ($_POST["acao"]=="inserir"){
    inserirCliente();
  }
  if ($_POST["acao"]=="alterar"){
    alterarCliente();
  }
  if ($_POST["acao"]=="excluir"){
    excluirCliente();
  }
}

function inserirCliente(){
$permitir = verificarCamposVazios();
if ($permitir == true) {

  $existe = verificarEmail($_POST['email']);

  if ($existe == false) {
      $cliente = array(
        'Nome' => $_POST['nome'],
        'Email' => $_POST['email'],
        'Endereco' => $_POST['endereco'],
        'Cidade' => $_POST['cidade'],
        'UF' => $_POST['uf'],             
      );

      $grava = DBCreate('Clientes',$cliente);

      header('Location:../pages/clientes/clientes.php');
    }
    else {
      echo "email já existe";
    }
  } else {
    echo "Ainda contem campos em branco";
  }
}

function alterarCliente(){
$permitir = verificarCamposVazios();
if ($permitir == true) {
 
      $cliente = array(
        'Nome' => $_POST['nome'],
        'Email' => $_POST['email'],
        'Endereco' => $_POST['endereco'],
        'Cidade' => $_POST['cidade'],
        'UF' => $_POST['uf'],       
      );

      $altera = DBUpdate('Clientes', $cliente, 'ID='.$_POST['id']);

      header('Location:../pages/clientes/clientes.php');
       
  } else {
    echo "Ainda contem campos em branco";
  }
}

function excluirCliente(){
  $exclui = DBDelete('Clientes', 'ID='.$_POST['id']);
  header('Location:../pages/clientes/clientes.php');
}

function getClientesNoBanco() {
  return DBRead('clientes','ORDER BY Nome');
}

function getClienteID($id) {
  $cliente = DBRead('Clientes', 'WHERE ID='.$id);
  return $cliente[0];
}

function verificarCamposVazios() {
  $cliente = array(
    'nome' => trim($_POST['nome']),
    'email' => trim($_POST['email']),
    'endereco' => trim($_POST['endereco']),
    'cidade' => trim($_POST['cidade']),
    'uf' => trim($_POST['uf']),
    
  );
  foreach ($cliente as $value) {
    if ($value == "") {
      return false;
    }
  }
  return true;
}

function verificarEmail($email) {
  $existe = DBRead('Clientes', 'WHERE Email="'.$email.'"');

  if ($existe == false or $existe[0]['email'] == $email) {
    return false;
  } else {
    return true;
  }
}


function formatoData($data) {
  $array = explode("-",$data);
  return $array2 = ($array[2]."/".$array[1]."/".$array[0]);
}
?>
