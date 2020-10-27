<?php
    $requestShoppingHistory = wp_remote_get('http://www.mocky.io/v2/5e960a2d2f0000f33b0257c4');
    if (!is_wp_error($requestShoppingHistory)) {
        $dataShoppingHistory = json_decode(wp_remote_retrieve_body($requestShoppingHistory), true);
        if (!is_wp_error($dataShoppingHistory)) {
            $clients2018 = array();
            foreach ($dataShoppingHistory as $data) {
                $date = explode('-', $data['data']);
                if ($date[2] == '2018') {
                    array_push($clients2018, $data['cliente']);
                }
            }
            $clients2018 = array_flip($clients2018);
        }
    }
    echo '<div class="container"><div class="row"><div class="col-md-12"><div class="list-group" id="list-tab" role="tablist">';
    foreach($clients2018 as $key => $data) {
        echo '<a class="list-group-item list-group-item-action" data-toggle="list" role="tab">'.$key.'</a>';
    }
    echo '</div></div></div></div>';