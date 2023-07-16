<?php include("cabecalho.php")?>
<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM novos WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {

                $barra = $user_data['barra'];
                $produto = $user_data['produto'];
                $marca = $user_data['marca'];
                $caracteristicas = $user_data['caracteristicas'];
                $valordevenda = $user_data['valordevenda'];
                $qtdcomprada =  $user_data['qtdcomprada'];
                $valordecompra = $user_data['valordecompra'];
            }
        }
        else
        {
            header('Location: consultaCatalogo.php');
        }
    }
    else
    {
        header('Location: consultaCatalogo.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Flowerd Makes</title>
    
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
<fieldset style="width: 50%; height: 220%; margin: 0px auto; background-color:#f8bdc6">
         
         
             <form id="insert_form" name="cadastrodeprodutos" method="post" action="saveEditCatalogo.php">
                
 
                 <div>
                     <label>Produto: *</label><br>
                     <input type="text"size="50" name="produto" placeholder="Informar nome do produto" id="produto" maxlength="50" value="<?php echo $produto ?>" required>
                 </div><br>
 
                 <div>
                     <label>Marca: *</label><br>
                     <input type="text" size="50" name="marca" placeholder="Informar a Marca" id="marca" maxlength="" value="<?php echo $marca ?>" required>
                 </div><br>
 
                 <div>
                     <label>Caracteristicas: *</label><br>
                     <input type="text" size="50" name="caracteristicas" placeholder="Informar cor, modelo etc." id="caracteristicas" maxlength="50" value="<?php echo $caracteristicas ?>">
                     <br>
                 </div><br>

                 <div>
                 <label>Valor de Venda por Unidade: *</label><br>
                     <input type="number" size="306" name="valordevenda" placeholder="valor proposto para venda" id="valordevenda" maxlength="6" value="<?php echo $valordevenda ?>">
                 </div><br>
                
                 <div>
                 <label>Qtd comprada: *</label><br>
                     <input type="number" size="6" name="qtdcomprada" placeholder="quantidade comprada do lote" id="qtdcomprada" maxlength="6" value="<?php echo $qtdcomprada ?>">
                     <br>
                                        

                 </div><br>
                 <div>
                 <label>Valor de Compra: *</label><br>
                     <input type="number" size="6" name="valordecompra" placeholder="valor de compra da unidade" id="valordecompra" maxlength="6" value="<?php echo $valordecompra ?>"><br><br>
</div>

<div>
                     <label>Código de Barras: *</label><br>
                     <input type="number" size="15" name="barra" placeholder="Ler código de Barra" id="barra" maxlength="15" value="<?php echo $barra ?>">
                 
                     <input type="hidden" name="id" value="<?php echo $id ?>">
                     <input type="submit" name="update" id="submit">
                     
                     

                 </div><br>

             </form>   
                
 </fieldset>
</body>
</html>