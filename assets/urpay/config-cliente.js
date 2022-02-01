/*///////////////////////////////////////////////////////////////////////
// FBXWEB - HOST & DEVELOPMENT                                         //
// Sistema de Integração (URPAY) - Desenvolvido por Fábio Britto       //
// WORKANA - Profile: https://www.workana.com/freelancer/fbxweb        //
// email: fabio237@hotmail.com / (11) 97157-0571                       //
// https://www.fbxweb.com.br                                           //
// cnpj: 14.194.140/0001-52                                            //
// última atualização: 12/06/2019 - 08:50:39                           //
*////////////////////////////////////////////////////////////////////////

$(document).ready(function() {
 /*   var formSaque = $('#form_urpay_saque');
    console.log(formSaque);
    formSaque.submit(function(a) {
        $('html, body').animate({
			scrollTop : $("body").offset().top
        }, 1000);
        setTimeout(function() {
            $('#aguarde').slideDown();
        });
        setTimeout(function() {
			$('#submit_saque').toggleClass('disabled');
		});
        a.preventDefault();
        $.ajax({
            url : formSaque.attr('action'),
			type : 'GET',
			data : new FormData(this),
			dataType : 'JSON',
			processData : false,
            contentType : false,
            success : function(jsonSaque) {
                console.log(jsonSaque);
                if (jsonSaque.controller == 1) {
                    console.log(jsonSaque);
                        setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#submit_saque').removeClass('disabled');
                    });
                    setTimeout(function() {
						$('#alerta').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta').slideUp('slow');
                    }, 5000);
                    $('#resposta').html(jsonSaque.alerta_form);

                }

                if (jsonSaque.controller == 2) {
                    //console.log(jsonSaque);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit_saque').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html(jsonSaque.alerta_form);

                }

                if (jsonSaque.controller == 3) {
                    //console.log(jsonSaque);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit_saque').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html(jsonSaque.alerta_form);

                }
        

            },

            error: function(){
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit_edit').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html("Ops! Ocorreu um erro inesperado!<br>Não foi possível realizar essa ação!");
            }

        });
    });
/*
    var form = $('#form_urpay_edit');
    console.log(form);
    form.submit(function(e) {
        $('html, body').animate({
			scrollTop : $("body").offset().top
        }, 1000);
        setTimeout(function() {
            $('#aguarde').slideDown();
        });
        setTimeout(function() {
			$('#submit_edit').toggleClass('disabled');
		});
        e.preventDefault();
        $.ajax({
            url : form.attr('action'),
			type : 'POST',
			data : new FormData(this),
			dataType : 'JSON',
			processData : false,
            contentType : false,
            success : function(json) {
                if (json.controller == 1) {
                    console.log(json);
                        setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#submit_edit').removeClass('disabled');
                    });
                    setTimeout(function() {
						$('#alerta').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta').slideUp('slow');
                    }, 5000);
                    $('#resposta').html(json.alerta_form);

                }

                if (json.controller == 2) {
                    console.log(json);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit_edit').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html(json.alerta_form);

                }

                if (json.controller == 3) {
                    console.log(json);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit_edit').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html(json.alerta_form);

                }
        

            },

            error: function(){
                //console.log(json);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit_edit').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html("Ops! Ocorreu um erro inexperado!<br>Não foi possível realizar essa ação!");
            }

        });
    });


   var form = $('#form_urpay_cadastro');
    console.log(form);
    form.submit(function(e) {
        $('html, body').animate({
			scrollTop : $("body").offset().top
        }, 1000);
        setTimeout(function() {
            $('#aguarde').slideDown();
        });
        setTimeout(function() {
			$('#cadastro_cadastro').toggleClass('disabled');
		});
        e.preventDefault();
        $.ajax({
            url : form.attr('action'),
			type : 'POST',
			data : new FormData(this),
			dataType : 'JSON',
			processData : false,
            contentType : false,
            success : function(json) {
                if (json.controller == 1) {
                    console.log(json);
                        setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#cadastro_cadastro').removeClass('disabled');
                    });
                    setTimeout(function() {
						$('#alerta').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta').slideUp('slow');
                    }, 5000);
                    $('#resposta').html(json.alerta_form);

                }

                if (json.controller == 2) {
                    console.log(json);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#cadastro_cadastro').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html(json.alerta_form);

                }

                if (json.controller == 3) {
                    console.log(json);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#cadastro_cadastro').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html(json.alerta_form);

                }
        

            },

            error: function(){
                console.log(json);
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#cadastro_cadastro').removeClass('disabled');
                    });
                    $('html, body').animate({
						scrollTop : 0
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideDown('slow');
                    }, 1000);
                    setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
                    }, 5000);
                    $('#resposta_erro').html("Ops! Ocorreu um erro inexperado!<br>Não foi possível realizar essa ação!");
            }

        });
    });
*/
});
$(document).ready(function() {
    $('#saque-realizado').DataTable({
        responsive: true,

        pagingType: 'full',
        "language": {
            "lengthMenu": "Exibindo _MENU_ registros por página",
            "zeroRecords": "Ops! Nenhum registro localizado",
            "info": "Exibindo _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "Nenhum registro localizado",
            "search": "Pesquisar:",
            "infoFiltered": "(Total de _MAX_ registros pesquisados)",
            paginate: {
                first:    '« Primeira',
                previous: '‹ Anterior',
                next:     'Próxima ›',
                last:     'Última »'
            },

        }

    });

    $('#contas-cadastradas').DataTable({
        responsive: true,

        pagingType: 'full',
        "language": {
            "lengthMenu": "Exibindo _MENU_ registros por página",
            "zeroRecords": "Ops! Nenhum registro localizado",
            "info": "Exibindo _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "Nenhum registro localizado",
            "search": "Pesquisar:",
            "infoFiltered": "(Total de _MAX_ registros pesquisados)",
            paginate: {
                first:    '« Primeira',
                previous: '‹ Anterior',
                next:     'Próxima ›',
                last:     'Última »'
            },
        }
    });

} );
$('#valor_saque').mask('#.##0,00', {reverse: true});