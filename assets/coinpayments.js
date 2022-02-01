$("#coin_submit").click(function() {
  var id_fatura = $("#coinID").val();
  var nome = $("#coinNome").val();
  var email = $("#coinEmail").val();
$.ajax({
	type: 'POST',
	url: '//workanatestes.tk/coin.php',
	data: {'id_fatura': id_fatura, 'nome': nome, 'email': email},
	dataType: "json",

        beforeSend: function() {
        $("#coinNome").prop("disabled", true);
        $("#coinEmail").prop("disabled", true);
        },

        success: function(data) {
            if (data.txn_id) {
                alert(nome);
            }else{
                alert(data.error);
            }
        $("#coinNome").prop("disabled", false);
        $("#coinEmail").prop("disabled", false);
        },
        error: function() {
            alert("Erro no Json");
            $("#coinNome").prop("disabled", false);
            $("#coinEmail").prop("disabled", false);
        }
    });
});