<?php
    $requestShoppingHistory = wp_remote_get('http://www.mocky.io/v2/5e960a2d2f0000f33b0257c4');
    if (!is_wp_error($requestShoppingHistory)) {
        $dataShoppingHistory = json_decode(wp_remote_retrieve_body($requestShoppingHistory), true);
        if (!is_wp_error($dataShoppingHistory)) {
            usort($dataShoppingHistory, function ($a, $b) {
                // Ordena o array de acordo com o valorTotal do menor valor para o maior
                return $a['valorTotal'] < $b['valorTotal'] ? -1 : 1;
            });
            $return = array();
            foreach ($dataShoppingHistory as $v) {
                if (isset($return[$v['cliente']])) {
                    // Se achar duplicado, segue
                    continue;
                }
                // Se não achar duplicado, insere no array
                $return[$v['cliente']] = $v;
            }
        }
    }
    echo '<div class="container"><div class="row"><div class="col-md-12"><div class="list-group" id="list-tab" role="tablist">';
    foreach($return as $data) {
        echo '<a class="list-group-item list-group-item-action" data-toggle="list" role="tab">['.$data['valorTotal'].'] '.$data['cliente'].'</a>';
    }
    echo '</div></div></div></div>';