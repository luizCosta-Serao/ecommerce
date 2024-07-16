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
  
  <header class="header">
    <section class="container">
      <div>
        <a href="<?php echo INCLUDE_PATH ?>">Ecommerce</a>
      </div>
      <nav>
        <ul>
          <li><a href="<?php echo INCLUDE_PATH ?>">Carrinho (0)</a></li>
          <li class="finalizar"><a href="<?php echo INCLUDE_PATH ?>">Finalizar Pedido</a></li>
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
  
</body>
</html>