$(document).ready(function(){

    $(document).on('click', '#EnviarFormulario', function(){

        let nome = $('#nome').val();
        let email = $('#email').val();
        let mensagem = $('#mensagem').val();

        if(nome == '' || email == '' || mensagem == ''){

            alert('Preencha todos os campos do formulário!');

            return;
        }

        $.ajax({
            url: baseURL+'requests/send_contact_form',
            type: 'POST',
            data: {nome:nome,email:email,mensagem:mensagem},

            success: function(){

                alert('Formulário enviado com sucesso!');

                $('#nome').val('');
                $('#email').val('');
                $('#mensagem').val('');
            },

            error: function(message){

                alert('Erro ao enviar o formulário de contato');

                console.log(message.responseText);
            }
        });
    });

});