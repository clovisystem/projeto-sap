
<script src="../js/jquery-3.2.1.min.js"></script>

<script>
window.onload=function(){
    $("#inserirProduto").hide();
}
function exibeInsercao(){
    $("#inserirProduto").show(1000);
}
</script>

        <button class="form-control" onclick="exibeInsercao()" name="inserir" value="Inserir Produtos">Inserir Produtos</button>

<?php
include("../conexao.php");
    
        echo'<form name="salva" method="post" action="">';
            echo'<div class="form-group" >';
    
            echo'<input type="hidden" name="nome" value="'.$func_nome.'" />';
            echo'<input type="hidden" name="senha" value="'.$func_senha.'" />';
    
            echo'<table class="table table-striped" id="inserirProduto" >';
            echo'<tr>';
            echo'<td><input type="text" name="produto" class="form-control" placeholder="Nome do produto"/></td>';
            echo'<td><input type="text" name="valor" class="form-control" placeholder="Seu valor em R$"/></td>';          
            echo'<td><input type="text" name="quantidade" class="form-control" placeholder="Quantas unidades?"/></td>';
            echo'<td><button  name="salvar" class="form-control" value="Salvar">Salvar</button></td>';
            echo'<tr>';
            echo'</table>';
            echo'</div>';
        echo'</form>';

  

        if($_POST["salvar"]=="Salvar"){
            $produto=filter_input(INPUT_POST,produto);
            $valor=filter_input(INPUT_POST,valor);
            $qtde=filter_input(INPUT_POST,quantidade);
	
            $valor=(float)$valor;

            echo '<script>document.querySelector("#menu").style.display="none";</script>';
				
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="nome" value="'.$func_nome.'" />';
            echo '<input type="hidden" name="senha" value="'.$func_senha.'" />'; 
            echo '</form>';

            
            $verificaExistencia=mysqli_query($conexao,"SELECT * FROM produtos WHERE prod_nome='$produto'");
            $verificaExistenciaLinhas=mysqli_num_rows($verificaExistencia);
            echo $verificaExistenciaLinhas;
         
            if($verificaExistenciaLinhas > 0){
                $atualizaProduto=mysqli_query($conexao,"UPDATE SET produtos WHERE prod_nome='$produto' and prod_qtde=prod_qtde + ".(int)$qtde);
                
            }
            else{
                $insereProduto=mysqli_query($conexao,"insert into produtos (prod_nome,prod_valor,prod_qtde) values ('$produto','".number_format($valor,2,".",",")."','$qtde')");
                
                
                if(!$insereProduto){
                    echo"falha";
                }
                else{
                    echo "<div class='alert alert-success'>Seu produto foi cadastrado</div>";
                }
            }
            
            $queryProdutos=mysqli_query($conexao,"SELECT * FROM produtos");               
        }
        







$queryProdutos=mysqli_query($conexao,"SELECT * FROM produtos");

$linhaProdutos=mysqli_num_rows($queryProdutos);
echo $linhaProdutos;
if($linhaProdutos > 0){
?>
<table class="table table-striped">
<thead>
    <tr>
        <th>Produto</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Editar</th>
    </tr>
</thead>
<tbody>
    <tr>
<?php
    while($row=mysqli_fetch_assoc($queryProdutos)){
        echo'<td id="prod_nome" contenteditable="false" onclick="salvar()">'.$row["prod_nome"].'</td>';
        echo'<td id="prod_valor" contenteditable="false" onclick="salvar()">'.$row["prod_valor"].'</td>';
        echo'<td id="prod_qtde" contenteditable="false" oncclick="salvar()">'.$row["prod_qtde"].'</td>';
        echo'<td ><button name="editar" id="editar" value="Editar" onclick="editar()">Editar'.$row["prod_nome"].'</button></td>';
        echo'</tr><tr>';
    }
}
else{
    echo "<div class='alert alert-warning'>Não há produtos cadastrados</div>";
    //echo'<td ><button name="editar" value="Editar" onclick="editar()">Editar '.$row["prod_nome"].'</button></td>';

}

?>
    </tr>
</tbody>
</table>
<script>
function editar(){

    var content_nome = document.querySelector('#prod_nome');
    var content_valor = document.querySelector('#prod_valor');
    var content_qtde = document.querySelector('#prod_qtde');
  
    content_nome.contentEditable= "true";
    content_valor.contentEditable= "true";
    content_qtde.contentEditable= "true";


    //if(document.getElementById("editar").innerHTML == "Editar"){
     //   document.getElementById("editar").innerHTML = "Gravar";

    //}
   
   
}
function salvar(){
    if(document.getElementById("editar").value == "Editar"){
        document.getElementById("editar").innerHTML = "Gravar";

    }
}
</script>