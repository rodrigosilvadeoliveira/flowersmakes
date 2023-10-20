<?php
session_start();

// Verifique se o array 'carrinho' já está definido na sessão
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array(); // Se não estiver definido, crie-o como um array vazio
}
// Conecte-se ao banco de dados (substitua com suas configurações)
include('config.php');


// Função para adicionar um produto ao carrinho
function adicionarProdutoAoCarrinho($idProduto, $conexao)
{
    // Consulte o banco de dados para obter detalhes do produto com base no ID
    $sql = "SELECT * FROM novos WHERE id = $idProduto";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $produtoDB = $result->fetch_assoc();

        // Verifique se o produto já existe no carrinho
        
        $produtoExistente = false;
        // Se o produto não existe no carrinho, adicione-o
        if (!$produtoExistente) {
            $produtoDB['quantidade'] = 1; // Adicione a quantidade inicial
            $_SESSION['carrinho'][] = $produtoDB;
        }

        // Redirecione de volta para a página de produtos ou exiba uma mensagem de sucesso
        // header("Location: produtos.php"); // Redirecionar para a página de produtos, se necessário
        // exit(); // Encerre o script, se necessário

        return true; // Retorna verdadeiro para indicar que o produto foi adicionado com sucesso
    } else {
        return false; // Retorna falso para indicar que o produto não foi encontrado
    }
}

// Verifique se o ID do produto foi enviado via POST
if (isset($_POST['id'])) {
    $idProduto = $_POST['id'];
    adicionarProdutoAoCarrinho($idProduto, $conexao);
}


?>
 <script>
// Defina uma variável global para o valor total geral
let valorTotalGeral = 0;

function calcularTotal(select, valorVenda) {
    const quantidade = select.value;
    const total = quantidade * valorVenda;
    const totalElement = select.parentElement.nextElementSibling.querySelector(".total");
    totalElement.textContent = "R$" + total.toFixed(2);

    // Atualize o valor total geral
    atualizarValorTotalGeral();
}

// Função para atualizar o valor total geral
function atualizarValorTotalGeral() {
    const todasLinhas = document.querySelectorAll(".total");
    let totalGeral = 0;

    todasLinhas.forEach(function(linha) {
        totalGeral += parseFloat(linha.textContent.replace("R$", ""));
    });

    // Atualize o valor total geral
    valorTotalGeral = totalGeral;

    // Exiba o valor total geral na célula desejada
    const valorTotalGeralCell = document.querySelector('#valorTotalGeralCell');
    if (valorTotalGeralCell) {
        valorTotalGeralCell.textContent = "R$" + valorTotalGeral.toFixed(2);
    }
}


// Chame a função para calcular o valor inicial
document.addEventListener("DOMContentLoaded", function() {
    const selects = document.querySelectorAll('select.categoria');
    selects.forEach(function(select) {
        const valorVenda = parseFloat(select.getAttribute('onchange').split(', ')[1].replace(')', ''));
        calcularTotal(select, valorVenda);
    });

    // Atualize o valor total geral ao carregar a página
    atualizarValorTotalGeral();
});

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Site</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="bootstrap.min.js"></script>
</head>
<body>
<div><img id="logo" src ="logo_flowers.png">
</div>
<a href="carrinho.php" id="continuar">Continuar Comprando</a>
<!--
<script>
  document.getElementById("continuar").addEventListener("click", function() {
    window.history.back();
  });
</script>-->
<h1>Carrinho de Compras</h1>

<table class="table" id="tabelaCarrinho">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Barra</th>
            <th scope="col">Produto</th>
            <th scope="col">Marca</th>
            <th scope="col">Caracteristicas</th>
            <th scope="col">Preço</th>
            <th scope="col">Qtd</th>
            <th scope="col">Total Produto
            </th>
            <th scope="col">Imagem</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
    <form action="carrinho - Copia.php" method="post">
        <?php
        
        // Verifique se o formulário foi enviado
if (isset($_POST['confirmar_pedido'])) {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    ini_set('display_errors', 1); // Exibir erros no navegador (para fins de desenvolvimento)
error_reporting(E_ALL); // Relatar todos os tipos de erro (para fins de desenvolvimento)
date_default_timezone_set('America/Sao_Paulo'); // Definir fuso horário para Brasil/Brasília

    // Verifique se houve erro na conexão com o banco de dados
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }
    $nome = $_POST['nome'];

    // Insira o cliente na tabela de clientes
$sql = "INSERT INTO clientes (nome) VALUES (?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $nome); // "s" indica que é uma string
$stmt->execute();

// Obtenha o ID do cliente gerado automaticamente
$id_clientes = $conexao->insert_id;
$status = 'pendente';

    // Insira o pedido na tabela de pedidos
    $sql = "INSERT INTO pedidos (id_clientes, status, data_pedido, hora_pedido) VALUES ( ?, '$status', CURDATE(), CURTIME())";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_clientes);
    $stmt->execute();

    // Obtenha o ID do pedido gerado automaticamente
    $id_pedido = $conexao->insert_id;

    // Inserir os produtos associados a esse pedido na tabela de produtos
    foreach ($_SESSION['carrinho'] as $produtoNoCarrinho) {
        $id_produto = $produtoNoCarrinho['id'];
        $quantidade = $produtoNoCarrinho['quantidade']; // Substitua pela forma correta de obter a quantidade
        $preco_unitario = $produtoNoCarrinho['valordevenda'];

        $sql = "INSERT INTO produto (id_pedido, id_produto, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("iiid", $id_pedido, $id_produto, $quantidade, $preco_unitario);
        $stmt->execute();
    }

    // Após concluir a inserção do pedido no banco, você pode limpar o carrinho
    $_SESSION['carrinho'] = array();

    // Feche a conexão com o banco de dados
    $conexao->close();

    
} 
            
        $valorTotal = 0;

        // Listar produtos no carrinho aqui
        foreach ($_SESSION['carrinho'] as $index => $produtoNoCarrinho) {
            echo "<tr>";
            echo "<td>" . $produtoNoCarrinho['id'] . "</td>";
            echo "<td>" . $produtoNoCarrinho['barra'] . "</td>";
            echo "<td>" . $produtoNoCarrinho['produto'] . "</td>";
            echo "<td>" . $produtoNoCarrinho['marca'] . "</td>";
            echo "<td>" . $produtoNoCarrinho['caracteristicas'] . "</td>";
            echo "<td>R$" . $produtoNoCarrinho['valordevenda'] . "</td>";
            // Valor padrão do select
    $valorPadraoSelect = 1;

    echo "<td>
        <select class='categoria' onchange='calcularTotal(this, " . $produtoNoCarrinho['valordevenda'] . ")' value='$valorPadraoSelect'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
        </select>
    </td>";

    // Valor total inicial da linha
    $linhaTotal = $produtoNoCarrinho['valordevenda'] * $valorPadraoSelect;
    
    echo "<td><span class='total'>R$" . number_format($linhaTotal, 2) . "</span></td>";
    
    echo "<td><img src='" . $produtoNoCarrinho['imagem'] . "' width='60' height='60'></td>";
    echo "<td>
        <a class='btn btn-sm btn-danger' href='deleteprodutodalistasite.php?id=" . $produtoNoCarrinho['id'] . "' title='Deletar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
            </svg>
        </a>
    </td>";
    
    echo "</tr>";

    $valorTotal += $linhaTotal;
                        }

                    
  ?>
   
            <tr>
            <tr>
    <td colspan="2">Valor Total:</td>
    <td id="valorTotalGeralCell" colspan="3">R$ 0.00</td>
    </tr>
            </tr>
        </tbody>
    </table>
    <!--<fieldset class="boxcliente" id="boxcliente">-->
<h1>Informar dados para Entrega</h1>
<h3>*Se optar por retirar em Loja em loja, não é necessário informar endereço</h3>
    <div class="col-md-5">
    <label for="nome" class="form-label">*Nome completo:</label>
    <input type="text" name="nome" id="nome" class="form-control" id="inputCity" required>
  </div>
  
  <div class="col-3">
    <label for="telefone" class="form-label">*Telefone:</label>
    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="dd numero" required>
  </div>
  
  <div class="col-md-5">
    <label for="email" class="form-label">Email:</label>
    <input type="email"  name="email" id="email" class="form-control">
  </div>
  
  <div class="col-5">
    <label for="endereco" class="form-label">Endereço:</label>
    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Rua,Avenida ...">
  </div>
  <div class="col-5">
    <label for="numero" class="form-label">Numero:</label>
    <input type="text" class="form-control" name="numero" id="numero" placeholder="123, bloco b, Ap10">
  </div>
  <div class="col-md-3">
    <label for="cidade" class="form-label">Cidade:</label>
    <input type="text" name="cidade" id="cidade" class="form-control">
  </div>
  <div class="col-md-2">
    <label for="estado" class="form-label">Estado:</label>
    <select name="estado" id="estado" class="form-select">
      <option selected>Selecione...</option>
      <option value="acre">AC</option>
      <option value="alagoas">AL</option>
      <option value="amapa">AP</option>
      <option value="amazonas">AM</option>
      <option value="bahia">BH</option>
      <option value="ceara">CE</option>
      <option value="distritoFederal">DF</option>
      <option value="espiritoSanto">ES</option>
      <option value="goias">GO</option>
      <option value="maranhao">MA</option>
      <option value="matoGrosso">MT</option>
      <option value="matoGrossodoSul">MS</option>
      <option value="minasGerai">MG</option>
      <option value="para">PA</option>
      <option value="paraiba">PB</option>
      <option value="parana">PR</option>
      <option value="pernanbuco">PE</option>
      <option value="piaui">PI</option>
      <option value="riodeJaneiro">RJ</option>
      <option value="rioGrandedoNorte">RN</option>
      <option value="rioGrandedoSul">RS</option>
      <option value="rodonia">RO</option>
      <option value="roraima">RR</option>
      <option value="santaCatarina">SC</option>
      <option value="saoPaulo">SP</option>
      <option value="sergipe">SE</option>
      <option value="tocantis">TO</option>
    </select>
  </div>
   </label>
    </div>
  </div>
   <div class="col-md-2">
    <label for="inputState" class="form-label">*Forma de Entrega:</label>
    <select id="inputState" class="form-select" name="tpentrega">
    <option value="">Selecione</option>
    <option value="retirar">Retirar na loja</option>
    <option value="entregar">Para entrega</option>
    </select>
  </div>
<input type="submit" name="confirmar_pedido" value="Confirmar Pedido">
    </form>
    
<!--</fieldset>-->

</body>
</html>

