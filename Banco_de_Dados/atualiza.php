<?php
ini_set("display_errors",0);
include_once("../Banco_de_Dados/conexao.php");

echo $produto=$_POST["produto"];
echo $valor=$_POST["valor"];
echo $qtde=$_POST["qtde"];
echo $id=$_POST["id"];


$atualizaProduto=mysqli_query($conexao,"UPDATE produtos SET prod_nome='$produto', prod_valor='$valor', prod_qtde='$qtde' WHERE prod_id=$id");

if($atualizaProduto){
    echo 'Produto atualizado com sucesso';
}
else{
    echo 'Não pudemos atualizar o produto';
}