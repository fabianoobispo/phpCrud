<?php
require 'database.php';

if(isset($_POST['acao'])) {
  if ($_POST["acao"]=="inserir"){
    inserirVenda();
  }
  
}

function inserirVenda(){
$permitir = verificarCamposVazios();
if ($permitir == true) {
 
      $venda = array(
        'ProdutoID' => $_POST['produtoid'],
        'ClienteID' => $_POST['clienteid'],
        'QuantidadeVenda' => $_POST['quantidadevenda'],               
      );
      
        //atualizar a quantidade do produto no banco de dados quantidade do produto
        $produto = DBQuerySingle(
          'SELECT `Quantidade` FROM `produtos` WHERE ID = '.$_POST['produtoid'].'');        
         
        foreach($produto as $p => $produtoAtualizado){          
            $produtoAtualizado = array(
              'Quantidade' => $produto[$p]['Quantidade'] - $_POST['quantidadevenda'],         
            );              
        };      
     
      $altera = DBUpdate('Produtos', $produtoAtualizado, 'ID='.$_POST['produtoid']);
       
      $grava = DBCreate('Vendas',$venda);        
       header('Location:../pages/vendas/vendas.php');  
   
  } else {
    echo "Ainda contem campos em branco";
  }
}


function getVendasNoBanco() {
  return DBQuerySingle(
    'SELECT 
        C.Nome as "NomeCliente", p.Produto as "Produto", p.Preco as "Preco", v.QuantidadeVenda as "Quantidade", 
        v.ID 
      FROM vendas as v
      INNER JOIN produtos as p
          ON v.ProdutoID = p.ID
      INNER JOIN clientes as c
          ON c.ID = v.ClienteID'
  );
}

function getProdutoNoBanco() {
  return DBRead('Produtos','ORDER BY ID');
}
function getClientesNoBanco() {
  return DBRead('Clientes','ORDER BY Nome');
}

function verificarCamposVazios() {
  $venda = array(
    'ProdutoID' => $_POST['produtoid'],
    'ClienteID' => $_POST['clienteid'],
    'QuantidadeVenda' => $_POST['quantidadevenda'],
  );
  foreach ($venda as $value) {
    if ($value == "") {
      return false;
    }
  }
  return true;
}
