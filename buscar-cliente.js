$(document).ready(function() {


    $("input[name='placa']").blur(function() {

        var $nome = $("input[name='nome']");
        var $veiculo = $("input[name='veiculo']");
        var $cor = $("input[name='cor']");
        $.getJSON('includes/buscar-cliente.php', {

            placa: $(this).val()



        }, function(json) {

            $nome.val(json.nome);
            $veiculo.val(json.veiculo);
            $cor.val(json.cor);




        });



    });





});