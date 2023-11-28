<?php include("cabecalho.php")?>
<?php
include('verificarLogin.php');
verificarLogin();
ini_set('display_errors', 1); // Exibir erros no navegador (para fins de desenvolvimento)
error_reporting(E_ALL); // Relatar todos os tipos de erro (para fins de desenvolvimento)
date_default_timezone_set('America/Sao_Paulo');
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
    echo "<h1 id='BemVindo'>Pagamentos Pendentes</h1>";
    ?>
    <div class="scroll-horizontal">
    <a id="incluirCadastro" value="Novo Cadastro" href="pagamentosPendentes.php">Pendentes</a>
    <a id="incluirCadastro" value="Novo Cadastro" href="pagamentosPagos.php">Pagos</a>
    
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
$sql = "SELECT * FROM pagamento WHERE tipodePagamento = 'pago' ORDER BY id DESC";

$result = $conexao->query($sql);
if ($result->num_rows > 0) {
    
    echo "<div class='scroll-horizontal'>";
    echo "<table class='table' id='tabelaLista'>";
    echo "<tr><th>#</th><th>Valor Total</th><th>Status</th><th>Data</th><th>Hora</th>
    <th>Detalhes</th><th><img class='' id='' src='img/tucano.png' align='' width='30' height='30'></th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
       
        echo "<td>" .$row['id']. "</td>";
        
        echo "<td>" .$row['valorTotal']. "</td>";

        echo "<td>" .$row['tipodePagamento']. "</td>";
       
        echo "<td>" .$row['datas']. "</td>";
        
        echo "<td>" .$row['hora']. "</td>";
        
        echo "<td>" .$row['obs']. "</td>";
        
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
            const id = event.target.getAttribute('data-id');

            // Aqui, você deve enviar uma solicitação AJAX para um arquivo PHP que atualizará o status do pedido
            // Substitua 'atualizarStatusPedido.php' pelo nome do arquivo PHP que você irá criar para processar a atualização.
            // Lembre-se de passar o ID do pedido como um parâmetro na solicitação.

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'atualizarPagamentos.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Atualize a tabela ou faça outras ações após a conclusão bem-sucedida
                    console.log('Status do pedido atualizado com sucesso');
                } else {
                    console.error('Erro ao atualizar o status do pedido');
                }
            };
            xhr.send('id=' + id);
        }
    });
</script>

</html>