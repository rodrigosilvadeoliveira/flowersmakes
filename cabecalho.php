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
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <img id="logoFlowers" src ="logo_flowers.png">
  <div class="container-fluid">
    <!--<a class="navbar-brand" href="#" id="menu">Menu</a>-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="catalogo.php">Catalogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sistema.php">Vendedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consultaCatalogo.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vendas.php">Atendimento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vendasrealizadas.php">Vendas Realizadas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="relatorios.php">Relatórios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consultaPedido.php">Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pagamentosPendentes.php">Pagamentos</a>
        </li>
        <!--
        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catalogo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cadastroProduto.php">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        -->
      </ul>
      <form class="d-flex" role="search" id="pesquisar">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
  <div class="d-flex">
    <a href="sair.php" class="btn btn-danger me5" id="sair">Sair</a>
</div>
</nav>
</header>
</body>
</html>