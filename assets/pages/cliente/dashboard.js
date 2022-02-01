$(document).ready(function(){

    /* Inicia o clipboard */
    let clipboard = new Clipboard('.clipboard');

    clipboard.on('success', function(){

        new Noty({
            type: 'success',
            text: '<i class="fa fa-check"></i> Link de indicação copiado com sucesso!',
            timeout: 3000
        }).show();
    });


    $(document).on('click', '#chave', function(){

        let binary_key = $('#chave:checked').val();

        $.ajax({
            url: baseURL+'requests/change_binary_key',
            data: {key: binary_key},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Chave binária alterada com sucesso!',
                        timeout: 3000
                    }).show();

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao alterar chave binária. Tente novamente.',
                        timeout: 3000
                    }).show();
                }
            },

            error: function(message){
                console.log('Erro ao alterar chave binária: ', message.responseText);
            }
        });

    });

    if(typeof data_inicio != 'undefined'){
        
        $("#fim_plano")
          .countdown(data_inicio, function(event) {
            $(this).text(
              event.strftime('%D dia(s) %H:%M:%S')
            );
        })
        .on('finish.countdown', function(){
            $('#fim_plano').html('PLANO EXPIRADO!');
        }); //countdown
    }

}); /* end ready */