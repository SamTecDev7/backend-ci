$(document).ready(function(){

    $(document).on('click', '#searchInvoice', function(){

        let id_fatura = $('#id_fatura').val().trim();

        if(id_fatura != ''){

            $.ajax({
                url: baseURL+'requests/search_invoice',
                data: {id_fatura: id_fatura},
                type: 'POST',
                dataType: 'json',

                beforeSend: function(){
                    $('#searchInvoice').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
                    $('#bloco_confirmacao').css('display', 'none');
                },

                success: function(callback){

                    if(callback.status == 1){
                        $('#valor_fatura').html(callback.valor_fatura);
                        $('#id_pay').val(id_fatura);

                        $('#bloco_confirmacao').css('display', 'block');

                    }else if(callback.status == 2){
                        swal('Desculpe', 'Mas a fatura que você está procurando já foi paga.', 'error');
                    }else{
                        swal('<font color="red">Oppps...', 'Desculpe, mas não foi possível localizar a fatura indicada. Por favor, verifique e tente novamente', 'error</font>');
                    }
                },

                complete: function(){
                    $('#searchInvoice').html('<i class="fa fa-search"></i> Buscar Fatura');
                },

                error: function(message){
                    console.log('Erro ao procurar fatura: ', message.responseText);
                }
            });
        }
    });

    $(document).on('click', '#finalizar_pagamento', function(){

        swal({
          title: '<font color="red">Você tem certeza?</font>',
          html: '<font color="red">Para confirmar o pagamento, selecione a opção abaixo e clique no botão <b>Confirmar</b></font>',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar',
          cancelButtonText: 'Cancelar',
          input: 'checkbox',
          inputValue: 1,
          inputPlaceholder:
            '&nbsp; Estou ciente que essa ação é irreversível',
          inputOptions: {checked: 'unchecked'},
          onOpen: function(){
            $('#swal2-checkbox').removeAttr('checked');
          },
          inputValidator: function (result) {
            return new Promise(function (resolve, reject) {
              if (result) {
                resolve()
              } else {
                reject('Você precisa selecionar a opção acima')
              }
            })
          }
        }).then(function () {

        let id_fatura = $('#id_pay').val();
        let forma_pagamento = $('#forma_pagamento:checked').val();
          
          $.ajax({
            url: baseURL+'requests/invoce_pay',
            data: {id_fatura: id_fatura, forma_pagamento: forma_pagamento},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    swal(
                         'Parabéns',
                         '<font color="green">A fatura foi paga com sucesso!</font>',
                         'success'
                         ).then(function(){
                            window.location.href=baseURL+'pagamento';
                         });

                }else if(callback.status == 2){

                    swal('<font color="red">Oppss...', 'A fatura que você está tentando pagar já foi paga anteriormente.', 'error</font>');

                }else if(callback.status == 3){

                    swal('Oppss...', 'A fatura que você está tentando pagar não existe', 'error');

                }else{

                    swal('<font color="red>Desculpe', 'Mas você não tem saldo suficiente para pagar essa fatura.', 'error</font>');
                }
            },

            error: function(message){
                console.log('Erro ao pagar fatura: ', message.responseText);
            }
          });

        })

    });

}); /* ready */