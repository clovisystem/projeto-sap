
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
    $conexao=mysqli_connect("localhost","root","9877xc","SAP");

    
    if($conexao){
        echo "<div id='sucesso'></div><div id='conectado'>conectado</div>";
    }
    else{
        echo "<div id='fracasso'></div><div id='desconectado'>desconectado</div>";
    };
    
?>
