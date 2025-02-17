<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
  <title>Ecommerce</title>
</head>
<body>
  <?php
    // Obtendo quantidade de itens diferentes no carrinho
    $cart = MySql::connect()->prepare("SELECT * FROM `cart`");
    $cart->execute();
    $cart = $cart->fetchAll();
    $cartTotal = count($cart);
  ?>
  <header class="header">
    <section class="container">
      <div>
        <a href="<?php echo INCLUDE_PATH ?>">Ecommerce</a>
      </div>
      <nav>
        <ul>
          <li><a href="<?php echo INCLUDE_PATH ?>">Carrinho (<?php echo $cartTotal; ?>)</a></li>
          <li class="finalizar"><a href="<?php echo INCLUDE_PATH ?>finalizar-pedido">Finalizar Pedido</a></li>
        </ul>
      </nav>
    </section>
  </header>

  <?php
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    if (file_exists('pages/'.$url.'.php')) {
      include('pages/'.$url.'.php');
    } else {
      include('pages/home.php');
    }
  ?>
  
  <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
  <script src="https://assets.pagseguro.com.br/checkout-sdk-js/rc/dist/browser/pagseguro.min.js"></script>
  <script src="<?php echo INCLUDE_PATH; ?>js/index.js"></script>
</body>
</html>