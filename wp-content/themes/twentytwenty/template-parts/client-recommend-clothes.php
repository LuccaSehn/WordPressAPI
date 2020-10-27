<?php
    $requestClient = wp_remote_get('http://www.mocky.io/v2/5de67e9f370000540009242b');
    if (!is_wp_error($requestClient)) {
        $dataClient = json_decode(wp_remote_retrieve_body($requestClient), true);
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <select id="clients" name="clients" class="form-control" onchange="recommendClothes()">
                <?php foreach($dataClient as $key => $data) { ?>
                    <option value="<?php echo $data['cpf'] ?>"><?php echo $data['nome'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-12" id="recommend_clothes_div">

        </div>
    </div>
</div>

<script>
    function recommendClothes() {
        const formData = new FormData();
        formData.append('action', 'recommendClothes');
        formData.append('client_cpf', $("#clients").val());
        $.ajax({
            type: 'POST',
            url: '/ProjetoWordpress/wp-content/themes/twentytwenty/ajax.php',
            dataType: "json",
            contentType: false,
            processData: false,
            data: formData,
            success: function (request) {
                $('#recommend_clothes_div').empty();
                $('#recommend_clothes_div').append('<p>De acordo com o preço das suas últimas compras, te recomendamos esse produto: </p>' +
                    '<ul>' +
                    '<li>'+request.data.marca+'</li>' +
                    '<li>'+request.data.preco+'</li>' +
                    '<li>'+request.data.produto+'</li>' +
                    '<li>'+request.data.tamanho+'</li>' +
                    '</ul>');
            },
            error: ({ responseJSON }) => {
                console.log(responseJSON);
            }
        });
    }
</script>