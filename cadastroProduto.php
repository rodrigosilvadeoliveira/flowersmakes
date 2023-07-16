<?php include("cabecalho.php")?>
<?php
if(isset($_POST['submit']))
{
include_once("config.php");
error_reporting(0);

$barra = $_POST['barra'];
$produto = $_POST['produto'];
$marca = $_POST['marca'];
$caracteristicas = $_POST['caracteristicas'];
$valordevenda = $_POST['valordevenda'];
$qtdcomprada =  $_POST['qtdcomprada'];
$valordecompra = $_POST['valordecompra'];

$result = mysqli_query($conexao, "INSERT INTO novos (barra,produto,marca,caracteristicas,valordevenda,qtdcomprada,valordecompra) values ('$barra','$produto','$marca','$caracteristicas','$valordevenda','$qtdcomprada', '$valordecompra')");

header('Location: cadastroProduto.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Sistema Flowers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
<a href="consultaCatalogo.php" >
<svg xmlns="http://www.w3.org/2000/svg" id="voltar" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg>
</a>
<br>
<fieldset class="boxformularioProduto" style="width: 38.5%; height: 220%; margin: 0px auto; background-color:#f8bdc6">
         
         
             <form id="insert_form" name="cadastrodeprodutos" method="post" action="cadastroProduto.php">
                  
 
                 <div>
                     <label class="nomedoCampo">Produto: *</label><br>
                     <input type="text" size="50" class="campoProduto" name="produto" placeholder="Informar nome do produto" id="produto" maxlength="50">
                 </div><br>
 
                 <div>
                     <label class="nomedoCampo">Marca: *</label><br>
                     <input type="text" size="50" class="campoProduto" name="marca" placeholder="Informar a Marca" id="marca" maxlength="">
                 </div><br>
 
                 <div>
                     <label class="nomedoCampo">Caracteristicas: *</label><br>
                     <input type="text" size="50" class="campoProduto" name="caracteristicas" placeholder="Informar cor, modelo etc." id="caracteristicas" maxlength="50"><br>
                 </div><br>

                 <div>
                 <label class="nomedoCampo">Valor de Venda por Unidade: *</label><br>
                     <input type="decimal" size="306" class="campoProduto" name="valordevenda" placeholder="valor proposto para venda" id="valordevenda" maxlength="6">
                 </div><br>
                
                 <div class="nomedoCampo">
                 <label>Qtd comprada: *</label><br>
                     <input type="number" size="6" class="campoProduto" name="qtdcomprada" placeholder="quantidade comprada do lote" id="qtdcomprada" maxlength="6"><br>
                                        

                 </div><br>
                 <div>
                 <label class="nomedoCampo">Valor de Compra: *</label><br>
                     <input type="decimal" size="6" class="campoProduto" name="valordecompra" placeholder="quantidade comprada do lote" id="valordecompra" maxlength="6"><br><br>
</div>

<div>
                     <label class="nomedoCampo">Código de Barras: *</label><br>
                     <input type="number" size="15" class="campoProduto" name="barra" placeholder="Ler código de Barra" id="barra" maxlength="15">
                 
                     <input type="submit" name="submit" id="incluirProduto">
                     
                     

                 </div><br>

             </form>   
                
 </fieldset>
</body>
</html>