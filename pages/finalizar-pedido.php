<section class="sub-header">
  <h2>Feche seu pedido</h2>
</section>

<section class="lista-pedidos">
  <h2>Carrinho</h2>
  <table>
    <tr>
      <td>Nome do produto</td>
      <td>Quantidade</td>
      <td>Valor</td>
    </tr>
    <?php
      $total = 0;
      $itemsCarrinho = MySql::connect()->prepare("SELECT * FROM `cart`");
      $itemsCarrinho->execute();
      $itemsCarrinho = $itemsCarrinho->fetchAll();
      foreach ($itemsCarrinho as $key => $value) {
        $total = $total + ($value['preco'] * $value['quantidade']);
    ?>
      <tr>
        <td><?php echo $value['nome_produto'] ?></td>
        <td><?php echo $value['quantidade'] ?></td>
        <td>R$ <?php echo number_format($value['preco'], 2, ',', '.'); ?></td>
      </tr>
    <?php } ?>
  </table>
</section>

<section class="finalizar-pedido">
  <h2>Total: R$ <?php echo number_format($total, 2, ',', '.') ?></h2>
  <a href="" class="btn-pagamento">Pagar Agora!</a>
</section>