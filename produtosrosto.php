<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <!--
<a href="formulario.php" id="cadastre">Cadastre-se</a>"
//-->
<header>
<div><img id="logoSite" src ="logo_flowers.png">

</div>
    <h1 id="tituloSite">Site Flowers Makes</u></h1>

    <div class="boxcarrinho">
    <a href="carrinho.php" id="login">Sacola</a>
    </div>
    <div class="boxlogin">
     <a href="login.php" id="login">Login</a>
    </div><!--
    <nav>
      <div class="horizontal_slider" id="slider_horizontal">
        <div class="slider_container" id="container_slider">
          <ul id="sobre_prod" align="center">
            <div class="item">
              <li class="sobre"><a href="#section1">Makes</a></li>
            </div>
            <div class="item">
              <li class="sobre"><a href="#rosto">Rosto</a></li>
            </div>
            Outros links ... 
          </ul>
        </div>
      </div>
    </nav>-->
    <div class="cabecalho" id="cabecalho">
<?php include('cabecalhoSite.php');?>
</div>    
</header>

<fieldset class="field">
    <div class="container">
        <div class="box1">
            <img class="imagens" id="" src="img/1592.jpeg" border="px">
            <strong class="nomeProduto" id="nomeProduto">Lenço umedecido redutor de poros - Max Love  </strong>
           <br> <strong id="sku">Nº 1592</strong>
            <h3 class="preço">R$12,00</h3>
            <form action="carrinho.php" method="post">
                <input type="hidden" name="id" value="1592">
                <input type="submit" class="addCarrinho" value="Adicionar ao Carrinho">
            </form>
        </div>

        <div class="box1">
    <img class="imagens" id="" src="img/1595.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">Água Micelar Detox - Max Love  </strong>
    <strong id="sku">Nº 1595</strong>
    <br><h3 class="preço">R$15,00</h3>
    <form action="carrinho.php" method="post">
                <input type="hidden" name="id" value="1595">
                <input type="submit" class="addCarrinho" value="Adicionar ao Carrinho">
                </form>
    </div>
    
    <div class="box1">
    <img class="imagens" id="" src="img/1895.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">Protetor Solar  </strong>
    <br><strong id="sku">Nº 1895</strong>
    <h3 class="preço">R$13,00</h3>
    <form action="carrinho.php" method="post">
                <input type="hidden" name="id" value="1895">
                <input type="submit" class="addCarrinho" value="Adicionar aoCarrinho">
            </form>
    </div>

    <div class="box1">
    <img class="imagens" id="" src="img/1595.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">Água Micelar Detox - Max Love  </strong>
    <strong id="sku">Nº 1595</strong>
    <h3 class="preço">R$15,00</h3>
    <button>Adicionar carrinho</button>
    </div>

    <div class="box1">
    <img class="imagens" id="" src="img/1895.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">ÁProtetor Solar - Max Love  </strong>
    <strong id="sku">Nº 1895</strong>
    <h3 class="preço">R$13,00</h3>
    <button>Adicionar carrinho</button>
    </div>

    <div class="box1">
    <img class="imagens" id="" src="img/1895.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">ÁProtetor Solar - Max Love  </strong>
    <strong id="sku">Nº 1895</strong>
    <h3 class="preço">R$13,00</h3>
    <button>Adicionar carrinho</button>
    </div>

    <div class="box1">
    <img class="imagens" id="" src="img/1895.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">ÁProtetor Solar - Max Love  </strong>
    <strong id="sku">Nº 1895</strong>
    <h3 class="preço">R$13,00</h3>
    <button>Adicionar carrinho</button>
    </div>

    <div class="box1">
    <img class="imagens" id="" src="img/1895.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">ÁProtetor Solar - Max Love  </strong>
    <strong id="sku">Nº 1895</strong>
    <h3 class="preço">R$13,00</h3>
    <button>Adicionar carrinho</button>
    </div>

    <div class="box1">
    <img class="imagens" id="" src="img/1895.jpeg" border="">
    <strong class="nomeProduto" id="nomeProduto">ÁProtetor Solar - Max Love  </strong>
    <strong id="sku">Nº 1895</strong>
    <h3 class="preço">R$13,00</h3>
    <button>Adicionar carrinho</button>
    </div>
</div>
</table>
</fieldset>
  
  
</body>
</html>