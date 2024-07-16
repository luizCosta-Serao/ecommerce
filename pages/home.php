<section class="sub-header">
  <h2>Compre seus produtos agora!</h2>
</section>

<section class="lista-produtos">
  <div class="container">
    <?php
      $produtos = MySql::connect()->prepare("SELECT * FROM `estoque`");
      $produtos->execute();
      $produtos = $produtos->fetchAll();
      foreach ($produtos as $key => $value) {
        $imagemProduto = MySql::connect()->prepare("SELECT * FROM `estoque_imagens` WHERE produto_id = ? LIMIT 1");
        $imagemProduto->execute(array($value['id']));
        $imagemProduto = $imagemProduto->fetch();
    ?>
    <div class="produto-single">
      <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagemProduto['imagem'] ?>" alt="">
      <h2><?php echo $value['nome'] ?></h2>
      <p>R$ <?php echo $value['preco'] ?></p>
      <a href="">Adicionar ao carrinho</a>
    </div>
    <?php } ?>
  </div>
</section>