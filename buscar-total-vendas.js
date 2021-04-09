$(function() {

    /*insira o arquivo na pagina desejada  e crie uma search bar com o id pesquisar*/
    /* não esqueça de adequar o arquivo buscar na pasta buscas para seu banco de dados */

    $("#placa").blur(function() {

        var placa = $(this).val();

        if (placa != '') {

            var dados = {

                palavra: placa

            }

            $.post('includes/buscar-total-vendas.php', dados, function(retorna) {

                $(".total").html(retorna);



            });
        } else {




            $(".total").html('');







        }



    })





})