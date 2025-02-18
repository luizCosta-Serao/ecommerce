<?php
header('Content-Type: application/json');
  define('TOKEN','token');
  define('URL','https://sandbox.api.pagseguro.com/orders');

  // Criando chave pública para pagamento com cartão
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://sandbox.api.assinaturas.pagseguro.com/public-keys",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_HTTPHEADER => [
      "Authorization: Bearer ".TOKEN,
      "accept: application/json"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
?>