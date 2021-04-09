$(document).ready(function() {


    $("select[name='servico']").blur(function() {

        var $valor = $("input[name='valor']");

        $.getJSON('includes/valor-servico.php', {

            servico: $(this).val()



        }, function(json) {

            $valor.val(json.valor);





        });



    });





});