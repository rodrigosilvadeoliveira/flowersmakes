<?php
include_once('config.php');

$sql = "SELECT * FROM novos WHERE siteprod = 'Carroussel' ORDER BY id DESC";
$result = $conexao->query($sql);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Flowers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="bootstrap.min.js"></script>
</head>
<body>

        <!--
<a href="formulario.php" id="cadastre">Cadastre-se</a>"
//-->
<header>
<div class="sitecabecalho" id="sitecabecalho">
<?php include('cabecalhoSite.php');?>
</div>    
</header>
<div id="tabelacarrousel" class="carroussel">
    <div class="carroussel-container">
        <?php
        // Listar produtos no carrinho aqui

        while ($produtoNoCarrinho = mysqli_fetch_assoc($result)) {
            echo '<div class="produto">';
            echo '<img class="imagenscarroussel" src="' . $produtoNoCarrinho['imagem'] . '">';
            echo '<div class="produto-info">';
            // Resto do código do produto
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>



<h1 id="titulohome">Nossa História</h1>

<h1 class="temasobre">A Flowers Makes foi fundada em 2023, as idealizadoras e fundadoras Vania e Kauany com o intuito de ajudar a ofercer produtos de beleza, com preços acessíveis, qualidades incríveis de diversas marcas.</h1>
<h3><img class="fotoimg" id="fotoimg" src="img/kauevania.jpeg"><p style="text-align: center"> Kauany Moreira </p></h3>

<h3 class="fraseentrega">"Nós como pessoas devemos viver em uma sociedade em que nos apoiamos em ajudar as pessoas na valorização da sua beleza interior e exterior." Nós fundadoras da Flowers Makes, quando resolvemos criar algo para mulheres, foi se baseando no que já passamos, por muitas vezes queríamos mudar um kit, porém o valor não era acessível, até mesmo itens individuais, mas o custo ainda era alto. Então resolvemos que a nossa empresa, irá atingir todo o público alvo e queremos facilitar para que todas possam adquirir sem nenhum constrangimento financeiro.</h3>

<h3><img class="fotoimg" id="fotoimg" src="img/vania.jpeg"><p style="text-align: center"> Vania Moreira </p></h3>
<h3 class="fraseentrega">Não queremos ser apenas uma empresa como qualquer outra, nós somos uma empresa diferenciada onde aqui você possa tomar um café e se sentir em casa, relacionamento próximo com nossos clientes. E ter um cuidado especial através do nossos atendimento, atender a necessidade do cliente é a nossa prioridade. <p> Percebemos como nosso trabalho tem impactado nas vidas das pessoas, quando recebemos mensagems e feedbacks positivos de nossos clientes, algumas pessoas tem dúvidas sobre os produtos, o que precisa comprar, como usar produtos, na Flowers Makes clientes tem toda assistência para proporcionar não só uma compra, mais sim ser bem atendida e satisfeito com nosso trabalho.</p></h3>
<h3 class="fraseentrega">Gostaria de tomar um café, vem na Flower Makes.</h3>
   

<h1 class="dadosentrega">Em junho 2023, a Flowers Makes viu a necessidade de crescer e se tornar uma empresa moderna e mais digital.</h1>

<h3><img class="fotoimg" id="fotoimg" src="img/rodrigo.jpg"><p style="text-align: center"> Rodrigo Oliveira </p></h3>
<h3 class="fraseentrega"> Junto com as ideias inovadoras das fundadoras, comecei a fazer parte dessa história na área de tecnologia, hoje a Flowers Makes tem seu sistema de loja, catalogo e realizaçao de pedidos pela Web, também de forma digital, queremos nos aproximar de nossos clientes, personalizar nosso atendimento e levar a loja na palma da mão das pessoas, que tem dia a dia corrido e muitas das vezes não tem tempo de ir na loja fisica, proporcionar a comodidade de fazer seu pedido e receber em casa.<p>Estamos em constante desenvolvimento, cada melhoria é pensando em nossos clientes, em saber que podem contar com a Flowers Makes quando precisarem, estamos alguns clicks de distância.</h3>

      <script>
$(document).ready(function(){
    $('.carroussel-container').slick({
        slidesToShow: 1, // Quantidade de slides visíveis ao mesmo tempo
        slidesToScroll: 1, // Quantidade de slides para avançar/retroceder
        autoplay: true, // Ativar a reprodução automática
        autoplaySpeed: 7000, // Velocidade da reprodução automática (em milissegundos)
    });
});
</script>

      
      <?php include('footerSite.php');?>
     
     
</body>
</html>