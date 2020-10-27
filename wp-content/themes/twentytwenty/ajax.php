<?php

$action = filter_input(INPUT_POST, 'action');

if ($action == 'recommendClothes') {
    try {
        $clientCpf = filter_input(INPUT_POST, 'client_cpf');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.mocky.io/v2/5e960a2d2f0000f33b0257c4",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        $shopHistory = json_decode($response, true);
        if(curl_error($curl)){
            // Caso aconteça um erro no curl
            $data = 'Request Error:' . curl_error($curl);
        } else {
            $clientItems = array();
            $totalItems = 0;
            $totalItemPrice = 0;
            foreach ($shopHistory as $shopHistoryData) {
                // Cria um array com todos os itens já comprados pelo cliente
                if ($shopHistoryData['cliente'] === $clientCpf) {
                    foreach ($shopHistoryData['itens'] as $item) {
                        array_push($clientItems, $item);
                        $totalItemPrice += $item['preco'];
                        $totalItems++;
                    }
                }
            }
            // Cálculo para determinar a média de preço
            $avgPrice = $totalItemPrice / $totalItems;
            foreach ($clientItems as $item) {
                if ($item['preco'] < $avgPrice) {
                    // Retorna um item com preço menor que a média
                    $data = $item;
                    break;
                }
            }
        }
        curl_close($curl);
        echo json_encode(array('status' => 'success', 'data' => $data));
    } catch (Exception $e) {
        http_response_code(404);
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    }
}
