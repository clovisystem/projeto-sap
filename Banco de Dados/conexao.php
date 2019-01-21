
<style>
#sucesso{
    border-radius:100%; background-color:green; width:12px; height:13px;
}

#fracasso{
    border-radius:100%; background-color:red; width:12px; height:13px;
}
#conectado{
    color:green;
    margin-top:-20px;
    margin-left:20px;
}
#desconectado{
    color:red;
    margin-top:-20px;
    margin-left:20px;
}
</style>

<?php
    $conexao=mysqli_connect("sql108.hyperphp.com","hp_20792636","A#7A#7A#79877xc","hp_20792636_sap");

    
    if($conexao){
        echo "<div id='sucesso'></div><div id='conectado'>conectado</div>";
    }
    else{
        echo "<div id='fracasso'></div><div id='desconectado'>desconectado</div>";
    };
    
?>
