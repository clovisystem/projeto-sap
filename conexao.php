<?php
    $conexao=mysqli_connect("localhost","root","9877xc","SAP");
    //$banco=mysql_select_db("controle");

    if($conexao){
        echo "conectado ao banco de dado";
    }
    else{
        echo "falha ao conectar ao banco de dados";
    };
    
?>
