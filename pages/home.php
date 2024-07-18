<section class="sub-header">
  <h2>Compre seus produtos agora!</h2>
</section>

<?php
  // Adicionando produto ao carrinho
  if(isset($_GET['add-cart'])) {
    $idProduto = $_GET['add-cart'];

    $itemCart = MySql::connect()->prepare("SELECT * FROM `cart` WHERE id_produto = ?");
    $itemCart->execute(array($idProduto));
    
    if ($itemCart->rowCount() == 0) {
      $produto = MySql::connect()->prepare("SELECT * FROM `estoque` WHERE id = ?");
      $produto->execute(array($idProduto));
      if ($produto->rowCount() === 1) {
        $produto = $produto->fetch();
        $nomeProduto = $produto['nome'];
        $precoProduto = $produto['preco'];
        $quantidade = 1;
        $sql = MySql::connect()->prepare("INSERT INTO `cart` VALUES (null, ?, ?, ?, ?)");
        $sql->execute(array($nomeProduto, $quantidade, $precoProduto, $idProduto));
      }
    } else {
        // Se produto já tiver sido adicionado no carrinho, aumentar apenas a quantidade do produto
        $itemCart = $itemCart->fetch();
        $novaQuantidade = $itemCart['quantidade'] + 1;
        $sql = MySql::connect()->prepare("UPDATE `cart` SET quantidade = ? WHERE id_produto = ?");
        $sql->execute(array($novaQuantidade, $idProduto));
    }
  }
?>

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
      <a href="<?php echo INCLUDE_PATH; ?>?add-cart=<?php echo $value['id'] ?>">Adicionar ao carrinho</a>
    </div>
    <?php } ?>
  </div>
</section>