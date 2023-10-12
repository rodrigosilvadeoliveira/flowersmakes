<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $barra = $_POST['barra'];
        $produto = $_POST['produto'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $caracteristicas = $_POST['caracteristicas'];
        $valordevenda = $_POST['valordevenda'];
        $qtdcomprada =  $_POST['qtdcomprada'];
        $valordecompra = $_POST['valordecompra'];
        $siteprod = $_POST['siteprod'];
        
        $sqlInsert = "UPDATE novos 
        SET barra='$barra',produto='$produto', categoria='$categoria', marca='$marca',caracteristicas='$caracteristicas',valordevenda='$valordevenda',qtdcomprada='$qtdcomprada',valordecompra='$valordecompra' ,siteprod='$siteprod'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: consultaCatalogo.php');

?>