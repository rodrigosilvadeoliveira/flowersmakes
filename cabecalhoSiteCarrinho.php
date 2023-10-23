<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Sistema Flowers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <script src="loja.js"></script>
</head>

<body>

<div><img id="logoSite" src ="logo_flowers.png">

</div>
    <h1 id="tituloSite">Site Flowers Makes</u></h1>
    <h1 id="fraseSite">Realce a beleza que você tem com a Flowers Makes</u></h1>
    <div class="boxcarrinho">
      <a class='btn btn-sm btn-danger' href='carrinho.php?id=" . $produto['id'] . "' title='carrinho'>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
          </a>
    </div>
    <!--<div class="boxlogin">
     <a href="login.php" id="login">Login</a>
    </div>



    
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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    
  <div class="container-fluid">
    <!--<a class="navbar-brand" href="#" id="menu">Menu</a>-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="catalogo.php">Promoção</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="produtosrosto.php">Rosto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consultaCatalogo.php">Olhos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produtosboca.php">Boca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vendasrealizadas.php">Acessórios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios.php">Aplicadores</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="relatorios.php">Sobrancelhas</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="relatorios.php">Corporal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios.php">Infanti</a>
        </li>

      </ul>
      <!--
      <form class="d-flex" role="search" id="pesquisar">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div><!--
  <div class="d-flex">
    <a href="sair.php" class="btn btn-danger me5" id="sair">Sair</a>
</div>-->
</nav>

</body>
</html>