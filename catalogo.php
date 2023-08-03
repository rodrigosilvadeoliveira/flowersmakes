<?php include("cabecalho.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Sistema Flowers</title>
  <style>
    /* ... (seu CSS aqui) ... */
    /* Estilo para o header fixo */
.fixed-header {
  position: fixed;
  top: 0;
  width: 100%;
  background-color: #333; /* Cor de fundo do header (ajuste conforme desejar) */
  z-index: 999; /* Certifique-se de que o header tenha uma z-index maior que outros elementos da página para que fique sobreposto a eles */
}

    #sobre_prod {			border: 25px solid #903;
    background: #903;
    margin: 0;
    padding:0;
}
#sobre {
    list-style: none; 
    margin: 10px;
     display: inline;
}
#sobre a {
    padding: 20px 40px; 
    margin:0;
    border: 0px solid #f00; 
    background: #903;
    text-decoration: none;
    color:#FFF;
/* cantos arredondados */
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
     border-radius:5px;
}
#sobre a:hover {
    background: #CCC;
    color: #000; 
     border-color: #000;
}
#slider_horizontal {
	display: block;
	width: 100%;
	overflow-x: scroll;
	margin-top: 20px;
	padding: 5px;
	box-sizing: border-box;
	
}
#slider_horizontal::-webkit-scrollbar {
	display: none;
}
#container_slider {
	display: block;
	white-space: nowrap;

}
.item {

    display: inline-block;
    margin-right: 10px;
}
#imagens{
    width: 250px;
    height: 250%;
    margin: 10px;

}
h2 {
    text-align: center;
    color: #000;
}
h3 {
    text-align: center;
}
#informarcaoProdutos{
    font-size: 16px;
    text-align: justify;
    margin-top: 10px;
}
#ilustrativa{
    font-size: 16px;

}
  </style>
</head>
<body>

  <header class="fixed-header">
  <?php include("cabecalho.php")?>
  <br>
    <nav>
      <div class="horizontal_slider" id="slider_horizontal">
        <div class="slider_container" id="container_slider">
          <ul id="sobre_prod" align="center">
            <!--MAQUIAGEM-Marcas-Rosto-Boca-Olhos-Pincéis-Skincare-Acessórios-Promoção-LANÇAMENTO-->
            <div class="item">
              <li class="sobre"><a href="#section1">Makes</a></li>
            </div>
            <div class="item">
              <li class="sobre"><a href="#rosto">Rosto</a></li>
            </div>
            <!-- Outros links ... -->
          </ul>
        </div>
      </div>
    </nav>
  </header>
<br><br><br><br><br><br><br><br>
  <section id="rosto">
    <!-- Conteúdo da Seção 1 -->
    <tr><td><img id="imagens" src="produtos/Trio_Sobrancelhas_uni_makeup1.jpeg" align="left" border=""><h3 id="ilustrativa">Imagens meramente ilustrativas.</h3>
  <h2 id="nomeProduto">Uni makeup<br>Paleta Trio Sobrancelhas Eyebrow Pocket</h2><h4 id="sku">Nº 1713</h4><h3 id="informarcaoProdutos"><br>
 <b> INFORMAÇÕES DO PRODUTO:</b>
O Trio de Sobrancelhas Eyebrow Pocket chegou para fazer a diferença e dar praticidade a sua maquiagem.
<br> É um estojinho super fofo com 3 tons de sombras e 1 pincel aplicador.
 <br><b>CARACTERÍSTICAS DO PRODUTO:</b>
 Efeito matte,
Preenchimento perfeito,
Acabamento natural.
<br>
<b>Modo de usar:</b> aplicar o Trio de Sobrancelhas Eyebrow Pocket Colors delineando e corrigindo possíveis falhas com o pincel aplicador.
  </h3></td></tr>
  </section>
  <!-- Outras seções ... -->
  <section id="section2">
    <!-- Conteúdo da Seção 1 -->
    <tr><td><img id="imagens" src="produtos/1664_Po_de_Banana_da_Amar_Make.jpeg" align="left" border=""><h3 id="ilustrativa">Imagens meramente ilustrativas.</h3>
  <h2 id="nomeProduto">Uni makeup<br>Paleta Trio Sobrancelhas Eyebrow Pocket</h2><h3 id="informarcaoProdutos"><br>
 <b> INFORMAÇÕES DO PRODUTO:</b>
O Trio de Sobrancelhas Eyebrow Pocket chegou para fazer a diferença e dar praticidade a sua maquiagem.
<br> É um estojinho super fofo com 3 tons de sombras e 1 pincel aplicador.
 <br><b>CARACTERÍSTICAS DO PRODUTO:</b>
 Efeito matte,
Preenchimento perfeito,
Acabamento natural.
<br>
<b>Modo de usar:</b> aplicar o Trio de Sobrancelhas Eyebrow Pocket Colors delineando e corrigindo possíveis falhas com o pincel aplicador.
  </h3></td></tr>
    </section>
    <section id="section3">
    <!-- Conteúdo da Seção 1 -->
    <tr><td><img id="imagens" src="produtos/Trio_Sobrancelhas_uni_makeup1.jpeg" align="left" border=""><h3 id="ilustrativa">Imagens meramente ilustrativas.</h3>
  <h2 id="nomeProduto">Uni makeup<br>Paleta Trio Sobrancelhas Eyebrow Pocket</h2><h3 id="informarcaoProdutos"><br>
 <b> INFORMAÇÕES DO PRODUTO:</b>
O Trio de Sobrancelhas Eyebrow Pocket chegou para fazer a diferença e dar praticidade a sua maquiagem.
<br> É um estojinho super fofo com 3 tons de sombras e 1 pincel aplicador.
 <br><b>CARACTERÍSTICAS DO PRODUTO:</b>
 Efeito matte,
Preenchimento perfeito,
Acabamento natural.
<br>
<b>Modo de usar:</b> aplicar o Trio de Sobrancelhas Eyebrow Pocket Colors delineando e corrigindo possíveis falhas com o pincel aplicador.
  </h3></td></tr>
    </section>
    <section id="section4">
    <!-- Conteúdo da Seção 1 -->
    <tr><td><img id="imagens" src="produtos/Trio_Sobrancelhas_uni_makeup1.jpeg" align="left" border=""><h3 id="ilustrativa">Imagens meramente ilustrativas.</h3>
  <h2 id="nomeProduto">Uni makeup<br>Paleta Trio Sobrancelhas Eyebrow Pocket</h2><h3 id="informarcaoProdutos"><br>
 <b> INFORMAÇÕES DO PRODUTO:</b>
O Trio de Sobrancelhas Eyebrow Pocket chegou para fazer a diferença e dar praticidade a sua maquiagem.
<br> É um estojinho super fofo com 3 tons de sombras e 1 pincel aplicador.
 <br><b>CARACTERÍSTICAS DO PRODUTO:</b>
 Efeito matte,
Preenchimento perfeito,
Acabamento natural.
<br>
<b>Modo de usar:</b> aplicar o Trio de Sobrancelhas Eyebrow Pocket Colors delineando e corrigindo possíveis falhas com o pincel aplicador.
  </h3></td></tr>
    </section>
    <section id="acessorios">
    <!-- Conteúdo da Seção 1 -->
    <tr><td><img id="imagens" src="produtos/pre_make_perfect_face.jpg" border="">
<h2>Perfect Face</h2><h3 id="informarcaoProdutos"><b> INFORMAÇÕES DO PRODUTO:</b>O Hidratante Belle Angel hidrata profundamente a pele após a remoção da maquiagem e pode ser usado como hidratante facial comum.<br>
creme pra hidratar a pele do rosto de marca referência em cuidados da pele, e uma das principais do mercado em produção de cremes faciais ideal pra firmar a pele e ajuda a produzir colágeno ele combate o envelhecimento precoce diminui rugas e diminui linhas de expressões pele iluminada e livres de toxinas protege a pele
<br><b>Dica:</b> E pra finalizar a sua rotina de Skin Care Pós-Make, aplique o hidratante no rosto e massageie em movimentos circulares até sua completa absorção. A diquinha é usar todos os dias.</h3></td></tr>
  <tr><td><a href="pagina_igrejas.html"><img id="imagens" src="produtos/escova_magica.jpeg" border=""><h2>Escova Magica</h2><h3>Escova para cabelo</h3></a></td></tr>
  <section id="section3">
  <tr><td><img id="imagens" src="produtos/Cute_Gloss_da_Vivai.jpg" border=""><h2>Cute Gloss da Vivai</h2><h3>Hidratante Labial</h3></td></tr>
</tr>
    </section>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const links = document.querySelectorAll(".sobre a");

      links.forEach((link) => {
        link.addEventListener("click", smoothScroll);
      });

      function smoothScroll(event) {
        event.preventDefault();
        const targetId = event.currentTarget.getAttribute("href");
        const targetPosition = document.querySelector(targetId).offsetTop;

        window.scroll({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  </script>
</body>
</html>