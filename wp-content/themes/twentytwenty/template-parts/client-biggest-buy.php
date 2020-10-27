<?php
    $requestShoppingHistory = wp_remote_get('http://www.mocky.io/v2/5e960a2d2f0000f33b0257c4');
    if (!is_wp_error($requestShoppingHistory)) {
        $dataShoppingHistory = json_decode(wp_remote_retrieve_body($requestShoppingHistory), true);
        if (!is_wp_error($dataShoppingHistory)) {
            $moreExpensiveItems = array();
            foreach ($dataShoppingHistory as $data) {
                // Filtra dados onde a data for igual a 2019
                $date = explode('-', $data['data']);
                if ($date[2] == '2019') {
                    foreach ($data['itens'] as $item) {
                        // Verifica se $item['preco'] é maior que o valor $moreExpensiveItems[$data['cliente']], caso verdade, substitui
                        $moreExpensiveItems[$data['cliente']] = $item['preco'] > $moreExpensiveItems[$data['cliente']] ? $item['preco'] : $moreExpensiveItems[$data['cliente']];
                    }
                }
            }
            // Ordena um array em ordem descrescente mantendo a associação entre índices e valores
            arsort($moreExpensiveItems);
        }
    }
    echo '<div class="container"><div class="row"><div class="col-md-12"><div class="list-group" id="list-tab" role="tablist">';
    foreach($moreExpensiveItems as $key => $data) {
        echo '<a class="list-group-item list-group-item-action" data-toggle="list" role="tab">['.$data.'] '.$key.'</a>';
    }
    echo '</div></div></div></div>';