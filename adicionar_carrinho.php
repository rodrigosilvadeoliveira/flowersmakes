<?php
session_start();

// Conecte-se ao banco de dados (substitua com suas configurações)
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'cadastro';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Verifique se a sessão do carrinho já existe; se não, crie-a
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Função para adicionar um produto ao carrinho
function adicionarProdutoAoCarrinho($idProduto, $conexao)
{
    // Consulte o banco de dados para obter detalhes do produto com base no ID
    $sql = "SELECT * FROM novos WHERE id = $idProduto";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $produtoDB = $result->fetch_assoc();

        // Adicione o produto ao carrinho
        $_SESSION['carrinho'][] = $produtoDB;

        // Redirecione de volta para a página de produtos ou exiba uma mensagem de sucesso
        // header("Location: produtos.php"); // Redirecionar para a página de produtos, se necessário
        // exit(); // Encerre o script, se necessário

        return true; // Retorna verdadeiro para indicar que o produto foi adicionado com sucesso
    } else {
        return false; // Retorna falso para indicar que o produto não foi encontrado
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div><img id="logo" src ="logo_flowers.png"></div>
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
            <th scope="col">Imagem</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $valorTotal = 0;

        // Verifique se o ID do produto foi enviado via POST
        if (isset($_POST['id'])) {
            $idProduto = $_POST['id'];
            
            // Tente adicionar o produto ao carrinho
            if (adicionarProdutoAoCarrinho($idProduto, $conexao)) {
                echo "<p>Produto adicionado ao carrinho com sucesso!</p>";
            } else {
                echo "<p>Produto não encontrado.</p>";
            }
        }

        // Listar produtos no carrinho
        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $produto) {
                // Listar produtos no carrinho aqui
            }
        } else {
            echo "<tr><td colspan='8'>Seu carrinho de compras está vazio.</td></tr>";
        }
        ?>

        <tr>
            <td colspan="5">Valor Total:</td>
            <td colspan="3">R$ <?php echo number_format($valorTotal, 2); ?></td>
        </tr>
    </tbody>
</table>
</body>
</html>

<?php
$conexao->close();
?>
