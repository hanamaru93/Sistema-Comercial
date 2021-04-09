var total = 0.0;

document.getElementById("servicos").innerHTML += "        Serviço        |        Valor       \n";
document.getElementById("servicos").innerHTML += "===============================================\n";

$('#adc').click(function() {
    var valor = $("#valo").val();
    var servi = $("#serv option:selected").text();
    var lado = $("#lado").val();
    console.log(servi);
    var area = servi;

    document.getElementById("servicos").innerHTML += "    " + area + " - " + lado + "      |      R$" + valor + "  \n";
    document.getElementById("servicos").innerHTML += "-----------------------------------------------\n";

    total += parseFloat(valor);
    document.getElementById('tot').value = parseFloat(total.toFixed(2));
    console.log(valor);
    console.log(total);


});