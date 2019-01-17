
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
        <div class="notificacao"></div>
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
            echo $valor;
            

            echo '<script>document.querySelector("#menu").style.display="none";</script>';
				
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="nome" value="'.$func_nome.'" />';
            echo '<input type="hidden" name="senha" value="'.$func_senha.'" />'; 
            echo '</form>';

            
            $verificaExistencia=mysqli_query($conexao,"SELECT * FROM produtos WHERE prod_nome='$produto'");
            $verificaExistenciaLinhas=mysqli_num_rows($verificaExistencia);
            //echo '<label class="form-control">'.$verificaExistenciaLinhas.' produtos cadastrados.</label>';
         
            if($verificaExistenciaLinhas > 0){
                $atualizaProduto=mysqli_query($conexao,"UPDATE SET produtos WHERE prod_nome='$produto' and prod_qtde=prod_qtde + ".(int)$qtde);
                
            }
            else{
                $insereProduto=mysqli_query($conexao,"insert into produtos (prod_nome,prod_valor,prod_qtde) values ('$produto',".number_format($valor,2,'.',',').",".$qtde.")");
               
                
                if($insereProduto){
                    echo "<div class='alert alert-success'>Seu produto foi cadastrado</div>";
                  
                }
                else{
                    echo"falha";
                   
                }
            }
            
            $queryProdutos=mysqli_query($conexao,"SELECT * FROM produtos");               
        }
        





//echo'<script>window.onload=function(){$("#gravar").hide();}</script>';

$queryProdutos=mysqli_query($conexao,"SELECT * FROM produtos ORDER BY prod_id DESC");

$linhaProdutos=mysqli_num_rows($queryProdutos);
echo '<label class="form-control">'.$linhaProdutos.' produtos cadastrados.</label>';
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
 $i=0;
    while($row=mysqli_fetch_assoc($queryProdutos)){
    //foreach($queryProdutos as $query){
    //for($i==0;$i<$linhaProdutos;$i++){
        //echo'<form method="post" action="">';
        //echo'<td><input type="text" style="border:none; background:transparent;" id="prod_nome" name="prod_nome_table" onmouseout="gravando()" contenteditable="false" onclick="salvar()" value="'.$queryProdutos->fetch_object()->prod_nome.'"/></td>';
        //echo'<td><input type="text" style="border:none; background:transparent;"  id="prod_valor" name="prod_valor_table" onmouseout="gravando()" contenteditable="false" onclick="salvar()" value="'.$queryProdutos->fetch_object()->prod_valor.'"/></td>';
        //echo'<td><input type="text" style="border:none; background:transparent;"  id="prod_qtde" name="prod_qtde_table"  onmouseout="gravando()" contenteditable="false" onclick="salvar()" value="'.$queryProdutos->fetch_object()->prod_qtde.'"/></td>';
        //echo'<input type="hidden" id="prod_id" name="prod_id_table" value="'.$queryProdutos->fetch_object()->prod_id.'"/>';
        
       
        $i;
        echo'<form method="post" action="">';
        echo'<td><input type="text" style="border:none; background:transparent;" id="prod_nome" name="prod_nome_table"  contenteditable="false" onclick="salvar('.$i.')" value="'.$row["prod_nome"].'"/></td>';
        
        echo'<td><input type="text" style="border:none; background:transparent;"  id="prod_valor" name="prod_valor_table"  contenteditable="false" onclick="salvar('.$i.')" value="'.$row["prod_valor"].'"/></td>';
        echo'<td><input type="text" style="border:none; background:transparent;"  id="prod_qtde" name="prod_qtde_table"   contenteditable="false" onclick="salvar('.$i.')" value="'.$row["prod_qtde"].'"/></td>';
        echo'<input type="hidden" id="prod_id" name="prod_id_table" value="'.$row["prod_id"].'"/>';

        echo'<td ><button name="gravar" class="btn btn-primary" id="gravar" value="Gravar"  style="width:46%; display:none;">Gravar</button>';
        echo'</form>';
        

        echo'<button name="editar" class="btn btn-primary" id="editar" value="Editar" onclick="editar('.$i.')" style="width:46%;">Editar '.$row["prod_nome"].'</button></td>';

        $i++;

        
        echo'</tr><tr>';

    }
}
else{
    echo "<div class='alert alert-warning'>Não há produtos cadastrados</div>";
    //echo'<td ><button name="editar" value="Editar" onclick="editar()">Editar '.$row["prod_nome"].'</button></td>';

}
    /*$produtoTable=$_POST["prod_nome_table"];
    $valorTable=$_POST["prod_valor_table"];
    $qtdeTable=$_POST["prod_qtde_table"];

    if($_POST["editar"]=="Gravar"){
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="nome" value="'.$func_nome.'" />';
        echo '<input type="hidden" name="senha" value="'.$func_senha.'" />'; 
        echo '</form>';
        $atualizaProduto=mysqli_query($conexao,"UPDATE produtos SET prod_nome='$produtoTable' and prod_valor='$valorTable' and prod_qtde='$qtdeTable'");
    }*/
?>
    </tr>
</tbody>
</table>
<script>
var i=0;
function editar(i){
    var content_nome = document.querySelectorAll('#prod_nome');
    var content_valor = document.querySelectorAll('#prod_valor');
    var content_qtde = document.querySelectorAll('#prod_qtde');

    

    //for(i==0;i<content_nome.length;i++){
        content_nome[i].contentEditable= "true";
        content_valor[i].contentEditable= "true";
        content_qtde[i].contentEditable= "true";

        content_nome[i].focus();
        content_nome[i].select();
    //}

   
    //if(document.getElementById("editar").innerHTML == "Editar"){
    //   document.getElementById("editar").innerHTML = "Gravar";

    //}


}




function salvar(i){

    var editar = document.querySelectorAll('#editar');
    var gravar = document.querySelectorAll('#gravar');

    editar[i].style.visibility="hidden";
    gravar[i].style.display="block";




    var content_nome = document.querySelectorAll('#prod_nome');
    var content_valor = document.querySelectorAll('#prod_valor');
    var content_qtde = document.querySelectorAll('#prod_qtde');
    var content_id = document.querySelectorAll('#prod_id');


    //if(document.getElementById("editar").value == "Editar"){
        //var nomeCampo=document.getElementById("editar").name = "gravar";
        //var nomeValor=document.getElementById("editar").value = "Gravar";
        //var nomeInnerHtml=document.getElementById("editar").innerHTML = "Gravar";
        
        $("#gravar").click(function(){
            
            content_nome[i].contentEditable= "false";
            content_valor[i].contentEditable= "false";
            content_qtde[i].contentEditable= "false";

            var prod_nome=$("#prod_nome").val();
            var prod_valor=$("#prod_valor").val();
            var prod_qtde=$("#prod_qtde").val();
            var prod_id=$("#prod_id").val();

            if(prod_nome != ""){
                var dados={produto:prod_nome,
                        valor:prod_valor,
                        qtde:prod_qtde,
                        id:prod_id};
                
                    $.post('../Banco de Dados/atualiza.php',dados,function(retorna){
                        $(".notificacao").html(retorna);
                    });
                
            }       
            alert(prod_nome);  
            alert(prod_id);  
            window.location="../Banco de Dados/atualiza.php";
            exit;
        });
        
  //      }


}
</script>


