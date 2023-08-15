<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();

include_once('config.php');
   // print_r($_SESSION);
    if((!isset($_SESSION['usuario'])== true) and ($_SESSION['senha']) == true)
    {
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      header('Location: login.php');
      
    }$logado = $_SESSION['usuario'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM vendas WHERE barra LIKE '%$data%' or produto LIKE '%$data%' or datas LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM vendas ORDER BY datas DESC";
    }
    $result = $conexao->query($sql);
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
<br><br><br>
   
<?php
    echo "<h3 id='BemVindo'>Vendas realizadas</h3>";
?>
<fieldset class="boxformularioDatas" style="width: 35.5%; height: 220%; margin-left: 1%; background-color:#f8bdc6">
<form id="dataRelatorio" method="POST" action="relatorio.php">
    <label for="data_inicio"><b>Relatorio de Vendas por produto:</b></label><br>
    <label for="data_inicio"><b>Data Inicio:</b></label>
    <input type="date" name="data_inicio" id="data_inicio" />
    <label for="data_fim"><b>Data Fim:</b></label>
    <input type="date" name="data_fim" id="data_fim" />
    <input type="submit" value="Exportar" id="Exportar"/>
</form>
</fieldset>
<fieldset class="boxformularioDatas" style="width: 35.5%; height: 220%; margin-left: 1%; background-color:#f8bdc6">
<form id="dataRelatorio" method="POST" action="relatorio_vendas.php">
    <label for="data_inicio"><b>Relatorio de Vendas diária:</b></label><br>
    <label for="data_inicio"><b>Data Inicio:</b></label>
    <input type="date" name="data_inicio" id="data_inicio" />
    <label for="data_fim"><b>Data Fim:</b></label>
    <input type="date" name="data_fim" id="data_fim" />
    <input type="submit" value="Exportar" id="Exportar"/>
</form>
</fieldset>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>