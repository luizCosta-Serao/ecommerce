<?php
  header('Content-Type: application/json');
  $token = 'token';

  $data["reference_id"] = "ex-00001";
  $data["customer"] = [
    "name" => "Jose da Silva",
    "email" => "email@test.com",
    "tax_id" => "12345678909",
    "phones" => [
      [
        "country" => "55",
        "area" => "11",
        "number" => "999999999",
        "type" => "MOBILE"
      ]
    ]
  ];
  $data["items"] = [
    [
      "name" => "nome do item",
      "quantity" => 1,
      "unit_amount" => 500
    ]
    ];
  $data["qr_codes"] = [
    [
      "amount" => [
        "value" => 500
    ],
    "expiration_date" => "2024-08-29T20:15:59-03:00",
    ]
  ];
  $data["shipping"] = [
    "address" => [
      "street" => "Avenida Brigadeiro Faria Lima",
      "number" => "1384",
      "complement" => "apto 12",
      "locality" => "Pinheiros",
      "city" => "São Paulo",
      "region_code" => "SP",
      "country" => "BRA",
      "postal_code" => "01452002"
    ]
  ];
  $data["notification_urls"] = [
    "https://meusite.com/notificacoes"
  ];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://sandbox.api.pagseguro.com/orders",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $token",
    "Content-type: application/json",
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