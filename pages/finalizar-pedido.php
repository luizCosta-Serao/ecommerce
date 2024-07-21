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
  <form name="formCard" id="formCard" method="post">
    <input type="text" name="publicKey" id="publicKey">
    <input type="text" name="encryptedCard" id="encryptedCard">
    <!--
    <label for="fullname">Nome Completo</label>
    <input type="text" name="fullname" id="fullname">

    <label for="cpf">CPF</label>
    <input type="text" name="cpf" id="cpf">

    <label for="bandeira">Bandeiras</label>
    <select name="bandeira" id="bandeira">
      <option value="visa">Visa</option>
    </select>

    <label for="valor">Valor</label>
    <select name="valor" id="valor">
      <option value="199.00">1x de R$ 199.00</option>
    </select>
      -->

    <label for="numero_cartao">Número do Cartão</label>
    <input type="text" name="numero_cartao" id="numero_cartao">

    <label for="nome_cartao">Nome no Cartão</label>
    <input type="text" name="nome_cartao" id="nome_cartao">

    <label for="cvv">CVV</label>
    <input type="text" name="cvv" id="cvv">

    <label for="mes_validade">Mês de Validade</label>
    <input type="text" name="mes_validade" id="mes_validade">

    <label for="ano_validade">Ano de Validade</label>
    <input type="text" name="ano_validade" id="ano_validade">

    <input type="submit" class="btn-pagamento" name="enviar" id="enviar" value="Enviar Pagamento">
  </form>

  <form id="boleto" action="" method="post">
      <input type="submit" id="gerar_boleto" value="Gerar Boleto">
  </form>

  <form id="pix" action="" method="post">
      <input type="submit" id="pagar_pix" value="Pagar com Pix">
  </form>
</section>