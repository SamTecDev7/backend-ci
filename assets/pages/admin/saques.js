$(document).ready(function(){

    $(document).on('click', '#MarcarComoPago', function(){

        let id_saque = $(this).attr('value');

        $.ajax({
            url: baseURL+'requests/pay_withdraw',
            data: {id_saque: id_saque},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    swal(
                         'Parabéns!',
                          '<b class="text-success">O saque foi marcado como pago com sucesso!</b>',
                          'success'
                         ).then(function(){
                            window.location.href=baseURL+'admin/saques/visualizar/'+id_saque
                         });
                }else{
                    swal('<b class="text-danger">Desculpe, mas não foi possível marcar com o pago. Verifique se o saque ainda existe.</b>', 'error');
                }
            },

            error: function(message){
                console.log('Erro ao marcar saque como pago: ', message.responseText);
            }
        });
    });

    $(document).on('click', '#Estornar', function(){

        let id_saque = $(this).attr('value');

        $.ajax({
            url: baseURL+'requests/reverse_withdraw',
            data: {id_saque: id_saque},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    swal(
                         'Parabéns!',
                          '<b class="text-success"> O saque foi estornado para o usuário com sucesso!</b>',
                          'success'
                         ).then(function(){
                            window.location.href=baseURL+'admin/saques/visualizar/'+id_saque
                         });
                }else{
                    swal('<b class="text-danger">Desculpe, mas não foi possível estornar o saque. Verifique se o saque ainda existe.</b>', 'error');
                }
            },

            error: function(message){
                console.log('Erro ao estornar o saque: ', message.responseText);
            }
        });
    });

}); /* ready */