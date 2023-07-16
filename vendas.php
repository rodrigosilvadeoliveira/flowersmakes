<?php include("cabecalho.php")?>
    
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Sistema Flowers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="bootstrap.min.js"></script>
    </head>
<body>
    
<?php
    echo "<h1 id='BemVindo'>Catalogo de Produtos e Estoque</h1>";
?>
<form method="POST" action="vendas.php">
        <label for="codigo_barras">Código de Barras:</label>
        <input type="text" name="codigo_barras" id="codigo_barras" />
        <input type="submit" value="Consultar" />
    </form>
<table class="table" id="tabelaAtendimento">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Barra</th>
      <th scope="col">Produto</th>
      <th scope="col">Marca</th>
      <th scope="col">Caracteristicas</th>
      <th scope="col">Preço</th>

      <th scope="col">......</th>
    </tr>
  </thead>
  <tbody>
  <?php
include_once('config.php');
session_start();

// Verifique se a lista de produtos já existe na sessão
if (!isset($_SESSION['produtos'])) {
    // Se não existir, crie uma nova lista vazia
    $_SESSION['produtos'] = array();
}

// Verifique se o código de barras foi enviado pelo formulário
if (isset($_POST['codigo_barras'])) {
    $codigoBarras = $_POST['codigo_barras'];

    // Realize a consulta no banco de dados
    $host = "Localhost";
    $usuario = "root";
    $senha = "";
    $banco = "cadastro";

    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM novos WHERE barra = '$codigoBarras'";
    $resultado = mysqli_query($conexao, $query);

    // Verifique se o produto foi encontrado
    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $_SESSION['produtos'][] = $row; // Adicione o produto à lista na sessão
    } else {
        echo "Nenhum produto encontrado com o código de barras informado.";
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conexao);
}
// Verifique se o botão de confirmação de compra foi clicado
if (isset($_POST['confirmar_compra'])) {
    // Realize as ações necessárias para confirmar a compra, como salvar no banco de dados, enviar e-mails, etc.

    // Conecte-se ao banco de dados
    $host = "Localhost";
    $usuario = "root";
    $senha = "";
    $banco = "cadastro";
    
    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Insira as informações da compra no banco de dados
    $dataHora = date('Y-m-d H:i:s'); // Data e hora atual
    foreach ($_SESSION['produtos'] as $produto) {
        $barra = $produto['barra'];
        $nomeProduto = $produto['produto'];
        $marca = $produto['marca'];
        $caracteristicas = $produto['caracteristicas'];
        $valordevenda = $produto['valordevenda'];

        // Query de inserção
        $query = "INSERT INTO vendas (barra, produto, marca, caracteristicas, valordevenda, data_hora) VALUES ('$barra', '$nomeProduto', '$marca', '$caracteristicas', '$valordevenda', '$dataHora')";
        mysqli_query($conexao, $query);
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conexao);

    // Limpe a lista de produtos na sessão
    $_SESSION['produtos'] = array();

    // Redirecione para a mesma página para atualizar a exibição
    header("Location: vendas.php");
    exit();
}

// Exclua um produto da lista se o ID for fornecido na URL
if (isset($_GET['id'])) {
  $idProduto = $_GET['id'];

  // Encontre o índice do produto com base no ID
  $indiceProduto = -1;
  foreach ($_SESSION['produtos'] as $indice => $produto) {
      if ($produto['id'] == $idProduto) {
          $indiceProduto = $indice;
          break;
      }
  }

  // Se o produto for encontrado, remova-o da lista
  if ($indiceProduto != -1) {
      array_splice($_SESSION['produtos'], $indiceProduto, 1);
  }
// Verifique se a lista de produtos existe na sessão
if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = array();
}




   // Se o produto for encontrado, remova-o da lista
    if ($indiceProduto != -1) {
        unset($_SESSION['produtos'][$indiceProduto]);
    }
}

// Exiba a lista de produtos e calcule o valor total
$valorTotal = 0; // Variável para armazenar o valor total

// Exiba a lista de produtos
foreach ($_SESSION['produtos'] as $produto) {
    echo "<tr>";
    echo "<td>" . $produto['id'] . "<br>";
    echo "<td>" . $produto['barra'] . "<br>";
    echo "<td>" . $produto['produto'] . "<br>";
    echo "<td>" . $produto['marca'] . "<br>";
    echo "<td>" . $produto['caracteristicas'] . "<br>";
    echo "<td>" . $produto['valordevenda'] . "<br>";
    echo "<br>";
    echo "<td>
            <a class='btn btn-sm btn-danger' href='deleteCatalogo.php?id=" . $produto['id'] . "' title='Deletar'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                </svg>
            </a>
        </td>";
    echo "</tr>";
    $valorTotal += $produto['valordevenda']; // Adicione o valor de venda ao valor total
}

// Exiba o valor total
echo "<tr>";
echo "<td colspan='4'>Valor Total:</td>";
echo "<td>" . $valorTotal . "</td>";
echo "</tr>";


?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmacaoModal">
    Confirmar Compra
</button>

<!-- Modal de confirmação de compra -->
<div class="modal fade" id="confirmacaoModal" tabindex="-1" aria-labelledby="confirmacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacaoModalLabel">Confirmar Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja confirmar a compra?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="vendas.php">
                    <button type="submit" name="confirmar_compra" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>