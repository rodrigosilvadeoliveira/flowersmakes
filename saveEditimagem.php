<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $produto = $_POST['produto'];
        $categoria = $_POST['categoria'];
        $siteprod = $_POST['siteprod'];
        
        
        if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
            $imagem = "./img/".$_FILES["imagem"]["name"];
            move_uploaded_file($_FILES["imagem"]["tmp_name"] ,$imagem);
        }else{
            $imagem = "";
        }
                
                $sqlInsert = "UPDATE novos 
                SET produto='$produto', categoria='$categoria', imagem='$imagem' ,siteprod='$siteprod'
                WHERE id=$id";
                $result = $conexao->query($sqlInsert);
                print_r($result);
            }
            header('Location: consultaimagem.php');

?>