$('#confirmarModal').on('shown.bs.modal', function (e) {
            $.ajax({
                type: 'POST',
                url: baseURL + 'requests/login_usuario',
                dataType: 'json',
                data: { login: $('#conta').val() }, 

                beforeSend: function() {
                   $("#confirmar").prop( "disabled", true )
                   $('#confirmarModal_msg').html("<h6 class='text-center'>Carregando informações</h6>");
                },

                success: function(data) {
                        $('#confirmarModal_msg').empty();
                        
                        var valor = parseInt($("#valor").val().replace(/[.]+/g, ''));
                        
                        var taxa = ((valor) * 4) / 100;
                        var total = valor + taxa;
                        
                        $('#c_conta').html(data.nome);
                        $('#c_valor').html('R$ ' + valor);
                        $('#c_taxa').html('R$ ' + taxa);
                        $('#c_total').html('R$ ' + total);
                        $('#confirmarModal_body').show();
                        $( "#confirmar" ).prop( "disabled", false );
                },
                
                error: function() {
                    $('#confirmarModal_body').hide();
                    $('#confirmarModal_msg').html("<h6 class='text-center'>Dados inválidos</h6>");
                }
            });

});
$(document).ready(function(){
    $("#confirmar").click(function() {
        $("#confirmar").prop( "disabled", true );
        
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: { conta: $('#conta').val(), valor: $('#valor').val() }, 

                success: function(data) {
                    
                    $('#confirmarModal').modal('hide');
                        setTimeout(function() {
                            
                                if (data.type === "success") {
                                    swal.fire(
                                         '<b class="text-success">Parabéns</b>',
                                         '<b class="text-success">'+data.msg+'</b>',
                                         'success'
                                         ).then(function(){
                                            location.reload();
                                         });
                                         
                                }else{
                                    Swal.fire({text: data.msg, type: 'error'});                                    
                                }
                        }, 1000);
                        $( "#confirmar" ).prop( "disabled", false );
                    },
                error: function() {
                    $('#confirmarModal').modal('hide');
                    setTimeout(function() {
                        Swal.fire({text: 'Problema na comunicação, tente novamente mais tarde!', type: 'error'});
                    }, 2200);
                    
                    
                    $( "#confirmar" ).prop( "disabled", false );
                }
            });
    });
});