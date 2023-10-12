<?php
session_start();

// Conecte-se ao banco de dados (substitua com suas configurações)
include('config.php');

// Verifique se a sessão do carrinho já existe; se não, crie-a
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Função para adicionar um produto ao carrinho
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
    <title>Site</title>
    <link rel="stylesheet" href="style.css">
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
        <?php
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
</body>
</html>

<?php
$conexao->close();
?>