<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $tpcontato = $_POST['tpcontato'];
    $pedido = $_POST['pedido'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
    $status = 'pendente';

    $result = mysqli_query($conexao, "INSERT INTO contato (nome, sobrenome, telefone, email, tpcontato, pedido, assunto, mensagem, status) 
    VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$tpcontato', '$pedido', '$assunto', '$mensagem', '$status')");

    header('Location: contato.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato Flowers</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<header>
    <div class="cabecalho" id="cabecalho">
    <?php include('cabecalhoSite.php');?>
    </div>    

</header>
<form action="contato.php" method="post">


<h1 id="titulocategoria">Contato com a Flowers Makes</h1>

<h3 class="fraseentrega">*Estamos a disposição para te auxiliar e ter a melhor experiência em nosso site.<br> Deixe a baixo sua mensagem em breve entraremos em contato, não deixe se seleciona qual forma de contato é de sua preferência,<br> se forma escolhida for whatsAPP não deixe de informar o numero no campo telefone.</h3>

<div class="dadoscliente">    
<div class="col-md-5">
    <label for="nome" class="form-label">*Nome:</label>
    <input type="text" name="nome" id="nome" class="form-control" required>
  </div><br>
  
  <div class="col-md-5">
    <label for="nome" class="form-label">*Sobrenome:</label>
    <input type="text" name="sobrenome" id="sobrenome" class="form-control" required>
  </div><br>

  <div class="col-2">
    <label for="telefone" class="form-label">*Telefone:</label>
    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="dd numero" required>
  </div><br>
  
  <div class="col-md-5">
    <label for="email" class="form-label">Email:</label>
    <input type="email"  name="email" id="email" class="form-control">
  </div><br>

  <div class="col-md-5">
    <label for="inputState" class="form-label">*Forma de contato:</label>
    <select id="tpcontato" class="form-select" name="tpcontato">
        <option value="">Selecione</option>
        <option value="email">Email</option>
        <option value="whatsapp">WhatsApp</option>
    </select>
</div>
<br>

  <div class="col-2">
    <label for="telefone" class="form-label">Numero do Pedido:</label>
    <input type="num" class="form-control" name="pedido" id="pedido" placeholder="dd numero" required>
  </div><br>
  <div class="col-md-5">
    <label for="nome" class="form-label">*Titulo para Assunto:</label>
    <input type="text" name="assunto" id="assunto" class="form-control" required>
  </div><br>
  
  <div class="col-md-5">
    <label for="mensagem" class="form-label">*Deixe aqui sua mensagem:</label>
    <textarea name="mensagem" id="mensagem" class="form-control" rows="8" required></textarea>
</div><br>

  
  <br>
   </label>
   
   <button type="submit"  class="duvida" name="duvida" value="Enviar" data-toggle="modal" data-target="#pedidoSucessoModal" data-id-pedido="<?= $id_pedido ?>">
    Enviar
   </button>

</div>
</div>
</div>
</form>
<br>
<div class="endloja">
<img class="nossaloja" src="img/fotoloja.jpeg"><br><span><b>Venha visitar nossa loja:</b>
<br>
Horário: Seg á Sex (09:30 as 18:00) Sab (09:00 as 17:00)
<br>
Rua: Ciquenta e um, Nº1
<br>
Cep: 08472-715
<br>
Conj. Hab. Inacio Monteiro
<br>
São Paulo - SP</span>
</div>
</body>
</html>
