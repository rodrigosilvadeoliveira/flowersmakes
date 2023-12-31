<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();
//session_start();
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
        $sql = "SELECT * FROM novos WHERE id LIKE '%$data%' or produto LIKE '%$data%' or marca LIKE '%$data%' ORDER BY id DESC";
    }

?>
     
<!DOCTYPE html>
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
    <br><br>
    
<?php
    echo "<h1 id='BemVindo'>Lista de Pedidos Pendentes</h1>";
    ?>
<div class="scroll-horizontal">
<a id="incluirCadastro" value="Novo Cadastro" href="consultaPedido.php">Pedidos</a>
<a id="incluirCadastro" value="Novo Cadastro" href="consultaContato.php">Msg Clientes</a>

<br>
</div>
<?php
// Conexão ao banco de dados (substitua as credenciais pelo seu ambiente)
include_once('config.php');
// Verifique a conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Consulta SQL para obter pedidos pendentes com informações de clientes e produtos
$query = "SELECT
    c.id_clientes AS id_cliente,
    c.nome AS nome_cliente,
    c.telefone AS telefone_cliente,
    c.email AS email_cliente,
    c.tpentrega AS tp_entrega,
    c.endereco AS endereco_cliente,
    c.numero AS numero_cliente,
    c.cidade AS cidade_cliente,
    c.estado AS estado_cliente,
    p.id_pedidos AS id_pedido,
    p.status AS status_pedido,
    p.data_pedido AS data_pedido,
    p.hora_pedido AS hora_pedido,
    pr.id_lista AS id_lista,
    pr.id_pedido AS id_pedido_produto,
    pr.id_produto AS id_produto,
    pr.produto AS nome_produto,
    pr.marca AS marca_produto,
    pr.quantidade AS quantidade_produto,
    pr.preco_unitario AS preco_unitario,
    pr.linhatotal AS linhatotal_produto
FROM
    clientes AS c
JOIN
    pedidos AS p ON c.id_clientes = p.id_clientes
JOIN
    produto AS pr ON p.id_pedidos = pr.id_pedido
WHERE
    p.status = 'pendente'";

$resultado = $conexao->query($query);

// Verifique se a consulta retornou resultados
if ($resultado->num_rows > 0) {
    
    echo "<div class='scroll-horizontal'>";
    echo "<table class='table' id='tabelaLista'>";
    echo "<tr><th>Pedido</th><th>Status</th><th>Tp.entrega</th><th>Nome do Cliente</th><th>Telefone</th>
    <th>Endereço</th><th>Numero</th><th>Cidade</th><th>Estado</th><th>Data do Pedido</th><th>SKU</th><th>Produto</th><th>Marca</th><th>Vl.Prod</th><th>Qtd</th><th>Vl.Total</th>
    <th><img class='' id='' src='img/tucano.png' align='' width='30' height='30'></th></tr>";
    
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_pedido'] . "</td>";
        echo "<td>" . $row['status_pedido'] . "</td>";
        echo "<td>" . $row['tp_entrega'] . "</td>";
        echo "<td>" . $row['nome_cliente'] . "</td>";
        echo "<td>" . $row['telefone_cliente'] . "</td>";
        echo "<td>" . $row['endereco_cliente'] . "</td>";
        echo "<td>" . $row['numero_cliente'] . "</td>";
        echo "<td>" . $row['cidade_cliente'] . "</td>";
        echo "<td>" . $row['estado_cliente'] . "</td>";
        echo "<td>" . $row['data_pedido'] . "</td>";
        echo "<td>" . $row['id_produto'] . "</td>";
        echo "<td>" . $row['nome_produto'] . "</td>";
        echo "<td>" . $row['marca_produto'] . "</td>";
        echo "<td>" . $row['preco_unitario'] . "</td>";
        echo "<td>" . $row['quantidade_produto'] . "</td>";
        echo "<td>" . $row['linhatotal_produto'] . "</td>";
        echo "<td><button class='concluir-button' data-id='" . $row['id_pedido'] . "'>Concluir</button></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";
} else {
    echo "Nenhum pedido pendente encontrado.";
}

// Feche a conexão com o banco de dados
$conexao->close();
?>
    
    </tr>
  </tbody>
</table>
</div>

</body>
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
        window.location = 'consultaCatalogo.php?search='+search.value;
    }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('categoria').addEventListener('change', function() {
      var categoriaSelecionada = this.value;
      var linhas = document.querySelectorAll('tbody tr');

      linhas.forEach(function(linha) {
        var categoriaTd = linha.querySelector('td:nth-child(4)'); // Quarta coluna é a de Categoria
        var categoriaProduto = categoriaTd.textContent.toLowerCase().trim(); // Pegando o texto da categoria e colocando em minúsculas

        // Verificando se a categoria selecionada é igual à categoria do produto na linha atual
        if (categoriaSelecionada === '' || categoriaProduto === categoriaSelecionada) {
          linha.style.display = 'table-row'; // Mostra a linha
        } else {
          linha.style.display = 'none'; // Esconde a linha
        }
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('marca').addEventListener('change', function() {
      var categoriaSelecionada = this.value;
      var linhas = document.querySelectorAll('tbody tr');

      linhas.forEach(function(linha) {
        var categoriaTd = linha.querySelector('td:nth-child(5)'); // Quarta coluna é a de Categoria
        var categoriaProduto = categoriaTd.textContent.toLowerCase().trim(); // Pegando o texto da categoria e colocando em minúsculas

        // Verificando se a categoria selecionada é igual à categoria do produto na linha atual
        if (categoriaSelecionada === '' || categoriaProduto === categoriaSelecionada) {
          linha.style.display = 'table-row'; // Mostra a linha
        } else {
          linha.style.display = 'none'; // Esconde a linha
        }
      });
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('qtdcomprada').addEventListener('change', function() {
      var categoriaSelecionada = this.value;
      var linhas = document.querySelectorAll('tbody tr');

      linhas.forEach(function(linha) {
        var categoriaTd = linha.querySelector('td:nth-child(8)'); // Quarta coluna é a de Categoria
        var categoriaProduto = categoriaTd.textContent.toLowerCase().trim(); // Pegando o texto da categoria e colocando em minúsculas

        // Verificando se a categoria selecionada é igual à categoria do produto na linha atual
        if (categoriaSelecionada === '' || categoriaProduto === categoriaSelecionada) {
          linha.style.display = 'table-row'; // Mostra a linha
        } else {
          linha.style.display = 'none'; // Esconde a linha
        }
      });
    });
  });
</script>
<script>
  // Obtenha o elemento select
const categoriaSelect = document.getElementById('categoria');

// Array com novas categorias
const novasCategorias = ['teste', 'Teste2'];

// Função para adicionar as novas categorias ao select
function adicionarNovasCategorias() {
  for (const novaCategoria of novasCategorias) {
    const option = document.createElement('option');
    option.value = novaCategoria;
    option.textContent = novaCategoria;
    categoriaSelect.appendChild(option);
  }
}

// Chame a função para adicionar as novas categorias
adicionarNovasCategorias();
  </script>
   <script>
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('concluir-button')) {
            const idPedido = event.target.getAttribute('data-id');

            // Aqui, você deve enviar uma solicitação AJAX para um arquivo PHP que atualizará o status do pedido
            // Substitua 'atualizarStatusPedido.php' pelo nome do arquivo PHP que você irá criar para processar a atualização.
            // Lembre-se de passar o ID do pedido como um parâmetro na solicitação.

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'atualizarStatusPedido.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Atualize a tabela ou faça outras ações após a conclusão bem-sucedida
                    console.log('Status do pedido atualizado com sucesso');
                } else {
                    console.error('Erro ao atualizar o status do pedido');
                }
            };
            xhr.send('idPedido=' + idPedido);
        }
    });
</script>

</html>