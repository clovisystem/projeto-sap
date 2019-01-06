<?php
include "conexao.php";

$insere=mysqli_query($con,"insert into funcionarios(nome_func,senha_func,setor_func) values('clovis','gg','dados')");

if($insere){
    echo'inserido';
}
else{
    echo'falha';
}