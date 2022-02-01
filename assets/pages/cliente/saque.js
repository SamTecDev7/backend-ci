$(document).ready(function(){
    $('#valor_saque').mask('##.##0,00', {reverse: true});
    $("#confirmar").click(function() {
        
        if ($("#conta").val() == ''){
                 Swal.fire({html: '<b class="text-danger">O campo conta não pode ficar em branco</b>', type: 'error'});
return;
        }
            

            $.ajax({
                url: baseURL+'requests/withdraw',
                type: 'POST',
                dataType: 'json',
                data: { tipo_chave: $('#tipo_chave').val(), metodo: $('#metodo option:selected').val(), valor_saque: $('#valor_saque').val(), conta: $('#conta').val() }, 

                beforeSend: function() {
                $('#preloader').show();
                },

                success: function(callback){
                    $('#preloader').hide();

                    if(callback.status == 1){

                        swal.fire(
                             '<b class="text-success">Parabéns</b>',
                             '<b class="text-success">Saque solicitado com sucesso, em breve o dinheiro estará na sua conta.</b>',
                             'success'
                             ).then(function(){
                                window.location.href=baseURL+'saque';
                             });

                    }else if(callback.status == 2){
                        Swal.fire({html: '<b class="text-danger">O valor do saque é maior do que você tem em conta. Por favor, verifique e tente novamente.</b>', type: 'error'});

                    }else if(callback.status == 4){
                        Swal.fire({html: '<b class="text-danger">O valor que você está solicitando é menor que o permitido. Informe um valor maior.</b>', type: 'error'});
                    
                    }else if(callback.status == 5){
                        Swal.fire({html: '<b class="text-danger">O valor máximo de saque é R$ 5.000,00 (Cinco Mil),  Informe um valor menor.</b>', type: 'error'});

                    }else{
                        Swal.fire({html: '<b class="text-danger">Ocorreu um erro na solicitação de saque (erro: '+callback.error+').</b>', type: 'error'});
                    }
                },

                error: function() {
                    $("#msg").html('<h4 class="text-center alert alert-danger">Problema na comunicação, tente novamente mais tarde!</h4>');
                    $('#preloader').hide();
                }
            });
    });
});