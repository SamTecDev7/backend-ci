$(document).ready(function(){

    $(document).on('change', '#tipo_saque', function(){

        $('.lugar_recebimento').css('display', 'block');
        $('#local_recebimento').prop('checked', false);

        $('#conta_bancaria').prop('checked', false);
        $('#carteira_bitcoin').prop('checked', false);
        $('#mibank').prop('checked', false);

        $('.recebimento_conta').css('display', 'none');
        $('.recebimento_carteira').css('display', 'none');
        $('.recebimento_mibank').css('display', 'none');

        $('#bloco_confirmacao').css('display', 'none');

        $('#valor_saque').val('');
    });

    $(document).on('change', '#local_recebimento', function(){

        let local = $('#local_recebimento:checked').val();

        $('#bloco_confirmacao').css('display', 'none');
        $('#conta_bancaria').prop('checked', false);
        $('#carteira_bitcoin').prop('checked', false);
        $('#mibank').prop('checked', false);
        $('#valor_saque').val('');

        if(local == 1){
            $('.recebimento_conta').css('display', 'block');
            $('.recebimento_carteira').css('display', 'none');
            $('.recebimento_mibank').css('display', 'none');
        }else if(local == 2){
            $('.recebimento_conta').css('display', 'none');
            $('.recebimento_mibank').css('display', 'none');
            $('.recebimento_carteira').css('display', 'block');
        }else{
            $('.recebimento_conta').css('display', 'none');
            $('.recebimento_mibank').css('display', 'block');
            $('.recebimento_carteira').css('display', 'none');
        }
    });

    $(document).on('change', '#conta_bancaria', function(){

        $('#bloco_confirmacao').css('display', 'block');
        $('#valor_saque').val('');

        $("#valor_saque").maskMoney({allowNegative: true, thousands:'', decimal:'.', affixesStay: false});
    });

    $(document).on('change', '#carteira_bitcoin', function(){

        $('#bloco_confirmacao').css('display', 'block');
        $('#valor_saque').val('');

        $("#valor_saque").maskMoney({allowNegative: true, thousands:'', decimal:'.', affixesStay: false});
    });

    $(document).on('change', '#mibank', function(){

        $('#bloco_confirmacao').css('display', 'block');
        $('#valor_saque').val('');

        $("#valor_saque").maskMoney({allowNegative: true, thousands:'', decimal:'.', affixesStay: false});
    });

    $(document).on('keyup', '#agencia_numero', function(){

        if($(this).val() != ''){
            $('#errorAgencyNumber').html('');
            $('#agencia_numero').css('border', '');
        }else{
            $('#errorAgencyNumber').html('Informe o número de sua agência');
            $('#agencia_numero').css('border', '1px solid #ff6c60');
        }
    });

    $(document).on('keyup', '#conta_numero', function(){

        if($(this).val() != ''){
            $('#errorAccountNumber').html('');
            $('#conta_numero').css('border', '');
        }else{
            $('#errorAccountNumber').html('Informe o número de sua conta');
            $('#conta_numero').css('border', '1px solid #ff6c60');
        }
    });

    $(document).on('keyup', '#conta_digito', function(){

        if($(this).val() != ''){
            $('#errorAccountDigit').html('');
            $('#conta_digito').css('border', '');
        }else{
            $('#errorAccountDigit').html('Informe o digito da sua conta');
            $('#conta_digito').css('border', '1px solid #ff6c60');
        }
    });

    $(document).on('keyup', '#titular', function(){

        if($(this).val() != ''){
            $('#errorTitular').html('');
            $('#titular').css('border', '');
        }else{
            $('#errorTitular').html('Informe o nome do titular da conta');
            $('#titular').css('border', '1px solid #ff6c60');
        }
    });

    $(document).on('keyup', '#documento', function(){

        if($(this).val() != ''){
            $('#errorDocument').html('');
            $('#documento').css('border', '');
        }else{
            $('#errorDocument').html('Informe o CPF/CNPJ do titular da conta');
            $('#documento').css('border', '1px solid #ff6c60');
        }
    });

    $(document).on('click', '#cadastrar_conta_bancaria', function(){

        let errors = 0;
        let codigo_banco = $('#banco option:selected').val();
        let banco_completo = $('#banco option:selected').text();
        let agencia_numero = $('#agencia_numero').val();
        let agencia_digito = $('#agencia_digito').val();
        let conta_numero = $('#conta_numero').val();
        let conta_digito = $('#conta_digito').val();
        let tipo_conta = $('#tipo_conta').val();
        let operacao = $('#operacao').val();
        let titular = $('#titular').val();
        let documento = $('#documento').val();
        let TipoConta = (tipo_conta == 1) ? 'Corrente' : 'Poupança';

        if(agencia_numero == ''){
            $('#errorAgencyNumber').html('Informe o número de sua agência');
            $('#agencia_numero').css('border', '1px solid #ff6c60');
            errors++;
        }

        if(conta_numero == ''){
            $('#errorAccountNumber').html('Informe o número de sua conta');
            $('#conta_numero').css('border', '1px solid #ff6c60');
            errors++;
        }

        if(conta_digito == ''){
            $('#errorAccountDigit').html('Informe o digito da sua conta');
            $('#conta_digito').css('border', '1px solid #ff6c60');
            errors++;
        }

        if(titular == ''){
            $('#errorTitular').html('Informe o nome do titular da conta');
            $('#titular').css('border', '1px solid #ff6c60');
            errors++;
        }

        if(documento == ''){
            $('#errorDocument').html('Informe o CPF/CNPJ do titular da conta');
            $('#documento').css('border', '1px solid #ff6c60');
            errors++;
        }

        if(errors > 0){
            return false;
        }

        $.ajax({
            url: baseURL+'requests/add_bank_account',
            data: {codigo_banco:codigo_banco, agencia_numero:agencia_numero, agencia_digito:agencia_digito, conta_numero:conta_numero, conta_digito:conta_digito, tipo_conta:tipo_conta, operacao:operacao, titular:titular, documento:documento},
            type: 'POST',
            dataType: 'json',

            beforeSend: function(){

                $('#cadastrar_conta_bancaria').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },

            success: function(callback){

                let html = '';

                if(callback.status == 1){

                    $('.close').click();

                    html += '<tr data-id="'+callback.id+'">';
                    html += '<td><input type="radio" name="conta_bancaria" id="conta_bancaria" value="'+callback.id+'" /></td>';
                    html += '<td>';
                    html += banco_completo+'<br /><strong>'+TipoConta+'</strong>';
                    html += '</td>';
                    html += '<td>'+agencia_numero+'</td>';
                    html += '<td>'+conta_numero+'-'+conta_digito+'</td>';
                    html += '<td>';
                    html += '<button type="button" class="btn btn-danger" id="delete_bank" data-id="'+callback.id+'"><i class="fa fa-times"></i></button>';
                    html += '</td>';

                    $('#append_bank').append(html);

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Conta Bancária cadastrada com sucesso!',
                        timeout: 4000
                    }).show();

                    $('#errorAgencyNumber').html('');
                    $('#agencia_numero').removeAttr("style");
                    $('#errorAccountNumber').html('');
                    $('#conta_numero').removeAttr("style");
                    $('#errorAccountDigit').html('');
                    $('#conta_digito').removeAttr("style");
                    $('#errorTitular').html('');
                    $('#titular').removeAttr("style");
                    $('#errorDocument').html('');
                    $('#documento').removeAttr("style");

                    $('#banco option:selected').val('');
                    $('#agencia_numero').val('');
                    $('#agencia_digito').val('');
                    $('#conta_numero').val('');
                    $('#conta_digito').val('');
                    $('#tipo_conta').val('');
                    $('#operacao').val('');
                    $('#titular').val('');
                    $('#documento').val('');

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao cadastrar conta bancária. Tente novamente.',
                        timeout: 3000
                    }).show();

                }
            },

            complete: function(){

                $('#cadastrar_conta_bancaria').html('<i class="fa fa-plus"></i> Adicionar Conta Bancária');
            },

            error: function(message){
                console.log('Erro ao cadastrar conta bancária: ', message.responseText);
            }
        });
    });

    $(document).on('click', '#delete_bank', function(){

        let id_conta = $(this).attr('data-id');

        $.ajax({
            url: baseURL+'requests/delete_account_user',
            data: {id_conta: id_conta},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Conta Bancária deletada com sucesso!',
                        timeout: 4000
                    }).show();

                    $(document).find('tr[data-id="'+id_conta+'"]').css('background-color', '#ff6c60');
                    $(document).find('tr[data-id="'+id_conta+'"]').fadeOut(700);

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao excluir conta bancária. Tente novamente.',
                        timeout: 4000
                    }).show();
                }
            },

            error: function(message){
                console.log('Erro ao excluir conta: ', message.responseText);
            }
        });
    });

    $(document).on('keyup', '#carteira_bitcoin_input', function(){

        if($(this).val() == ''){
            $('#errorCarteiraBitcoin').html('Informe o endereço da carteira bitcoin');
            $('#carteira_bitcoin_input').css('border', '1px solid #ff6c60');
        }else{
            $('#errorCarteiraBitcoin').html('');
            $('#carteira_bitcoin_input').css('border', '');
        }
    });

    $(document).on('keyup', '#mibank_input', function(){

        if($(this).val() == ''){
            $('#errorMibank').html('Informe sua conta Mibank');
            $('#mibank_input').css('border', '1px solid #ff6c60');
        }else{
            $('#errorMibank').html('');
            $('#mibank_input').css('border', '');
        }
    });

    $(document).on('click', '#cadastrar_carteira_bitcoin', function(){

        let carteira_bitcoin = $('#carteira_bitcoin_input').val();

        if(carteira_bitcoin == ''){

            $('#errorCarteiraBitcoin').html('Informe o endereço da carteira bitcoin');
            $('#carteira_bitcoin_input').css('border', '1px solid #ff6c60');

            return false;
        }

        $.ajax({
            url: baseURL+'requests/add_carteira_bitcoin',
            data: {carteira_bitcoin:carteira_bitcoin},
            type: 'POST',
            dataType: 'json',

            beforeSend: function(){

                $('#cadastrar_carteira_bitcoin').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },

            success: function(callback){

                let html = '';

                if(callback.status == 1){

                    $('.close').click();

                    html += '<tr data-id="'+callback.id+'">';
                    html += '<td><input type="radio" name="carteira_bitcoin" id="carteira_bitcoin" value="'+callback.id+'" /></td>';
                    html += '<td>'+carteira_bitcoin+'</td>';
                    html += '<td>';
                    html += '<button type="button" class="btn btn-danger" id="delete_carteira" data-id="'+callback.id+'"><i class="fa fa-times"></i></button>';
                    html += '</td>';

                    $('#append_carteira').append(html);

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Carteira Bitcoin cadastrada com sucesso!',
                        timeout: 4000
                    }).show();

                    $('#errorCarteiraBitcoin').html('');
                    $('#carteira_bitcoin_input').removeAttr("style");
                    $('#carteira_bitcoin_input').val('');

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao cadastrar carteira bitcoin. Tente novamente.',
                        timeout: 3000
                    }).show();

                }
            },

            complete: function(){

                $('#cadastrar_carteira_bitcoin').html('<i class="fa fa-plus"></i> Adicionar Carteira Bitcoin');
            },

            error: function(message){
                console.log('Erro ao cadastrar carteira bitcoin: ', message.responseText);
            }
        });
    });

    $(document).on('click', '#cadastrar_mibank', function(){

        let mibank = $('#mibank_input').val();

        if(mibank == ''){

            $('#errorMibank').html('Informe sua conta Mibank');
            $('#mibank_input').css('border', '1px solid #ff6c60');

            return false;
        }

        $.ajax({
            url: baseURL+'requests/add_mibank',
            data: {mibank:mibank},
            type: 'POST',
            dataType: 'json',

            beforeSend: function(){

                $('#cadastrar_mibank').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },

            success: function(callback){

                let html = '';

                if(callback.status == 1){

                    $('.close').click();

                    html += '<tr data-id="'+callback.id+'">';
                    html += '<td><input type="radio" name="mibank" id="mibank" value="'+callback.id+'" /></td>';
                    html += '<td>'+mibank+'</td>';
                    html += '<td>';
                    html += '<button type="button" class="btn btn-danger" id="delete_mibank" data-id="'+callback.id+'"><i class="fa fa-times"></i></button>';
                    html += '</td>';

                    $('#append_mibank').append(html);

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Conta Mibank cadastrada com sucesso!',
                        timeout: 4000
                    }).show();

                    $('#errorMibank').html('');
                    $('#mibank_input').removeAttr("style");
                    $('#mibank_input').val('');

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao cadastrar conta Mibank. Tente novamente.',
                        timeout: 3000
                    }).show();

                }
            },

            complete: function(){

                $('#cadastrar_mibank').html('<i class="fa fa-plus"></i> Adicionar Mibank');
            },

            error: function(message){
                console.log('Erro ao cadastrar mibank: ', message.responseText);
            }
        });
    });

    $(document).on('click', '#delete_carteira', function(){

        let id_carteira = $(this).attr('data-id');

        $.ajax({
            url: baseURL+'requests/delete_account_user',
            data: {id_conta: id_carteira},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Carteira bitcoin deletada com sucesso!',
                        timeout: 4000
                    }).show();

                    $(document).find('tr[data-id="'+id_carteira+'"]').css('background-color', '#ff6c60');
                    $(document).find('tr[data-id="'+id_carteira+'"]').fadeOut(700);

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao excluir carteira bitcoin. Tente novamente.',
                        timeout: 4000
                    }).show();
                }
            },

            error: function(message){
                console.log('Erro ao excluir carteira bitcoin: ', message.responseText);
            }
        });
    });

    $(document).on('click', '#delete_mibank', function(){

        let id_mibank = $(this).attr('data-id');

        $.ajax({
            url: baseURL+'requests/delete_account_user',
            data: {id_conta: id_mibank},
            type: 'POST',
            dataType: 'json',

            success: function(callback){

                if(callback.status == 1){

                    new Noty({
                        type: 'success',
                        text: '<i class="fa fa-check"></i> Mibank deletada com sucesso!',
                        timeout: 4000
                    }).show();

                    $(document).find('tr[data-id="'+id_mibank+'"]').css('background-color', '#ff6c60');
                    $(document).find('tr[data-id="'+id_mibank+'"]').fadeOut(700);

                }else{

                    new Noty({
                        type: 'error',
                        text: '<i class="fa fa-times"></i> Erro ao excluir conta Mibank. Tente novamente.',
                        timeout: 4000
                    }).show();
                }
            },

            error: function(message){
                console.log('Erro ao excluir carteira bitcoin: ', message.responseText);
            }
        });
    });

    $(document).on('click', '#solicitar_saque', function(){

        let valor_saque = $('#valor_saque').val();
        let tipo_saque = $('#tipo_saque:checked').val();
        let local_recebimento = $('#local_recebimento:checked').val();
        let id_conta = '';

        if(local_recebimento == 1){
            id_conta = $('#conta_bancaria:checked').val();
        }else if(local_recebimento == 2){
            id_conta = $('#carteira_bitcoin:checked').val();
        }else{
            id_conta = $('#mibank:checked').val();
        }

        if(valor_saque <= 0){

            swal('Oppss...', 'Informe um valor maior que R$ 0.00 para sacar.', 'error');

            return false;
        }

        if(valor_saque == ''){

            swal('Oppss...', 'Você precisa informar o valor a ser retirado.', 'error');

            return false;
        }

        $.ajax({
            url: baseURL+'requests/withdraw',
            data: {valor_saque: valor_saque, tipo_saque: tipo_saque, local_recebimento: local_recebimento, id_conta: id_conta},
            type: 'POST',
            dataType: 'json',

            beforeSend: function(){

                $('#solicitar_saque').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },

            success: function(callback){

                if(callback.status == 1){

                    swal(
                         'Parabéns',
                         'Saque solicitado com sucesso, em breve o dinheiro estará na sua conta.',
                         'success'
                         ).then(function(){
                            window.location.href=baseURL+'saque';
                         });

                }else if(callback.status == 2){

                    swal('Oppss...', 'Mas o valor do saque é maior do que você tem em conta. Por favor, verifique e tente novamente. ', 'error');
                
                }else if(callback.status == 4){

                    swal('Erro!', 'O valor que você está solicitando é menor que o permitido. Informe um valor maior. ', 'error');

                
                }else{

                    swal('Desculpe', 'Mas ocorreu um erro na solicitação de saque (erro: '+callback.error+').', 'error');
                }
            },

            complete: function(){

                $('#solicitar_saque').html('<i class="fa fa-check"></i> Solicitar Saque');
            },

            error: function(message){
                console.log('Erro ao fazer o saque: ', message.responseText);
            }
        });
    });

}); /* ready */