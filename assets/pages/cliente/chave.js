$(document).ready(function(){

    $(document).on('click', '#chave_binaria', function(){

        let binary_key = $('#chave_binaria:checked').val();

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
    
}); /* ready */