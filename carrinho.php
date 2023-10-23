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
    const todasLinhas = document.querySelectorAll("tr");

    let totalGeral = 0;

    todasLinhas.forEach(function(linha) {
        const totalElement = linha.querySelector(".total");
        if (totalElement) {
            totalGeral += parseFloat(totalElement.textContent.replace("R$", ""));
        }
    });

    // Atualize o valor total geral
    valorTotalGeral = totalGeral;

    // Exiba o valor total geral na célula desejada
    const valorTotalGeralCell = document.querySelector("#valorTotalGeralCell");
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

// Adicione este código ao seu JavaScript
$(document).ready(function() {
    // Quando o botão do pedido é clicado
    $('button[data-target="#pedidoSucessoModal"]').click(function() {
        // Obtenha o id_pedido do botão clicado
        var idPedido = $(this).data('id-pedido');

        // Exiba o id_pedido no modal
        $('#id_pedido').text(idPedido);
    });
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-lWce9obiiWb1NzKd6ZkW3h/UrzVJx3rnTw1kz96Eo8/0s5HAHzVTmg2d8QQzWt8" crossorigin="anonymous"></script>

</head>
<body>
    <header>
<div class="cabecalho" id="cabecalho">
<?php include('cabecalhoSite.php');?>
</div> 
    </header>


<h1 class="titulocarrinho">Carrinho de Compras</h1>

<a href="produtosrosto.php" class="continuarcomprando" id="continuarcomprando"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg> Continuar Comprando</a>

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
   
    <form action="carrinho.php" method="post">
        <?php
        
        // Verifique se o formulário foi enviado
if (isset($_POST['confirmar_pedido'])) {
    
    include('config.php');

    ini_set('display_errors', 1); // Exibir erros no navegador (para fins de desenvolvimento)
error_reporting(E_ALL); // Relatar todos os tipos de erro (para fins de desenvolvimento)
date_default_timezone_set('America/Sao_Paulo'); // Definir fuso horário para Brasil/Brasília

    // Verifique se houve erro na conexão com o banco de dados
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $tpentrega = $_POST['tpentrega'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Insira o cliente na tabela de clientes
$sql = "INSERT INTO clientes (nome, telefone, email, tpentrega, endereco, numero, cidade, estado) VALUES (?, '$telefone', '$email', '$tpentrega', '$endereco', '$numero', '$cidade', '$estado')";
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
// Se o pedido foi confirmado com sucesso, exiba o modal
if ($stmt->execute()) {
    $id_pedido = $conexao->insert_id; // Defina o id_pedido
    echo '<script>
        var idPedido = ' . $id_pedido . ';
        $(document).ready(function(){
            $("#pedidoSucessoModal").modal("show");
        });
    </script>';
} else {
    // Lidere com o erro, se necessário
}
    
    
    // Inserir os produtos associados a esse pedido na tabela de produtos
    foreach ($_SESSION['carrinho'] as $produtoNoCarrinho) {
        $id_produto = $produtoNoCarrinho['id'];
        $produto = $produtoNoCarrinho['produto'];
        $marca = $produtoNoCarrinho['marca'];
        $quantidade = $_POST['quantidade']; // Substitua pela forma correta de obter a quantidade
        $preco_unitario = $produtoNoCarrinho['valordevenda'];
        $linhaTotal = $quantidade * $preco_unitario; // Calcule o valor da linha total

    $sql = "INSERT INTO produto (id_pedido, id_produto, produto, marca, quantidade, preco_unitario, linhatotal) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iissddd", $id_pedido, $id_produto, $produto, $marca, $quantidade, $preco_unitario, $linhaTotal);
    $stmt->execute();

}
    

    // Após concluir a inserção do pedido no banco, você pode limpar o carrinho
    $_SESSION['carrinho'] = array();

    // Feche a conexão com o banco de dados
    $conexao->close();
// Após o código onde você mostra o modal com sucesso, adicione o seguinte código JavaScript para definir a variável idPedido
echo '<script>
    var idPedido = ' . $id_pedido . ';
</script>';

    
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
    <select name='quantidade' class='categoria' onchange='calcularTotal(this, " . $produtoNoCarrinho['valordevenda'] . ")'>
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
    echo "<input type='hidden' name='preco_unitario' id='preco_unitario' value=''>";
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
    <tbody>
    <div class="modal fade" id="pedidoSucessoModal" tabindex="-1" role="dialog" aria-labelledby="pedidoSucessoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pedidoSucessoModalLabel">Parabéns seu pedido foi enviado</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Agradecemos sua preferência. Seu pedido (ID: <span id="id_pedido"><?= $id_pedido ?></span>) foi enviado com sucesso. Caso tenha alguma dúvida, entre em contato conosco. <a href="contato.php">Contato Flowers Makes</a>
</div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
            <tr>
            <tr>
    <td colspan="2">Valor Total:</td>
    <td id="valorTotalGeralCell" colspan="3">R$ 0.00</td>
    </tr>
    
            </tr>
        </tbody>
    </table>
    <!--<fieldset class="boxcliente" id="boxcliente">-->
<h1 class="dadosentrega">Informar dados para Entrega</h1>
<h3 class="fraseentrega">*Se optar por retirar em Loja em loja, informar endereço é opcional.</h3>
<div class="dadoscliente">    
<div class="col-md-5">
    <label for="nome" class="form-label">*Nome completo:</label>
    <input type="text" name="nome" id="nome" class="form-control" id="inputCity" required>
  </div><br>
  
  <div class="col-2">
    <label for="telefone" class="form-label">*Telefone:</label>
    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="dd numero" required>
  </div><br>
  
  <div class="col-md-5">
    <label for="email" class="form-label">Email:</label>
    <input type="email"  name="email" id="email" class="form-control">
  </div><br>
  <div class="col-md-2">
    <label for="inputState" class="form-label">*Forma de Entrega:</label>
    <select id="inputState" class="form-select" name="tpentrega">
    <option value="">Selecione</option>
    <option value="Retirar">Retirar na loja</option>
    <option value="Entregar">Para entrega</option>
    </select>
  </div><br>
  <div class="col-5">
    <label for="endereco" class="form-label">Endereço:</label>
    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Rua,Avenida ...">
  </div><br>
  <div class="col-5">
    <label for="numero" class="form-label">Numero:</label>
    <input type="text" class="form-control" name="numero" id="numero" placeholder="123, bloco b, Ap10">
  </div><br>
  <div class="col-md-3">
    <label for="cidade" class="form-label">Cidade:</label>
    <input type="text" name="cidade" id="cidade" class="form-control">
  </div><br>
  <div class="col-md-2">
    <label for="estado" class="form-label">Estado:</label>
    <select name="estado" id="estado" class="form-select">
      <option selected>Selecione...</option>
      <option value="ac">AC</option>
      <option value="al">AL</option>
      <option value="ap">AP</option>
      <option value="am">AM</option>
      <option value="bh">BH</option>
      <option value="ce">CE</option>
      <option value="df">DF</option>
      <option value="es">ES</option>
      <option value="go">GO</option>
      <option value="ma">MA</option>
      <option value="mt">MT</option>
      <option value="ms">MS</option>
      <option value="mg">MG</option>
      <option value="pa">PA</option>
      <option value="pb">PB</option>
      <option value="pr">PR</option>
      <option value="pe">PE</option>
      <option value="pi">PI</option>
      <option value="rj">RJ</option>
      <option value="rn">RN</option>
      <option value="rs">RS</option>
      <option value="ro">RO</option>
      <option value="rr">RR</option>
      <option value="sc">SC</option>
      <option value="sp">SP</option>
      <option value="se">SE</option>
      <option value="to">TO</option>
    </select>
  </div><br>
   </label>
   
   <button type="submit"  class="confirmarpedido" name="confirmar_pedido" value="Confirmar Pedido" data-toggle="modal" data-target="#pedidoSucessoModal" data-id-pedido="<?= $id_pedido ?>">
   
   <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg> Confirmar Pedido
   </button>

</div>
</div>
</div>
</form>

    
<!--</fieldset>-->

</body>

</html>

