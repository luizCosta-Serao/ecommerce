$(function() {
  let publicKey = '';
  let valor = '';
  let images = [];

  // Pagamento com cartão
  $('#formCard').submit(function(e) {
    e.preventDefault()
    let card = PagSeguro.encryptCard({
      publicKey: $('#publicKey').val(),
      holder: $('#nome_cartao').val(),
      number: $('#numero_cartao').val(),
      expMonth: $('#mes_validade').val(),
      expYear: $('#ano_validade').val(),
      securityCode: $('#cvv').val(),
    })
    let encrypted = card.encryptedCard;
    $('#encryptedCard').val(encrypted);
    $.ajax({
      url: 'http://localhost/ecommerce/ecommerce_php/ajax/cartao.php',
      method: 'post',
      data: {
        encryptedCard: encrypted
      }
    })
  })

  // Obtendo a chave publica para pagamento com cartão
  $.ajax({
    url: 'http://localhost/ecommerce/ecommerce_php/ajax/finalizar-pagamento.php',
    method: 'post',
    dataType: 'json'
  }).done(function(data) {
    $('#publicKey').val(data.public_key);
    publicKey = data.public_key;
  })

  // Pagamento com boleto
  $('#boleto').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'http://localhost/ecommerce/ecommerce_php/ajax/boleto.php',
      method: 'post',
      dataType: 'json'
    }).done(function(data) {
      console.log(data.links[0].href)
      location.href = data.links[0].href
    })
  })

  /*
  $('form').submit(function(e) {
    e.preventDefault();
    disabledForm();
  })

  function disabledForm() {
    $('form').animate({'opacity': '.4'});
    $('form').find('input').attr('disabled', 'disabled');
    $('form').find('select').attr('disabled', 'disabled');
  }

  function enableForm() {
    $('form').animate({'opacity': '1'});
    $('form').find('input').removeAttr('disabled')
    $('form').find('select').removeAttr('disabled')
  }
    */
})


