$(document).ready(function() {
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
			$('#submit-cadastro').toggleClass('disabled');
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
						$('#submit-cadastro').removeClass('disabled');
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
						$('#submit-cadastro').removeClass('disabled');
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
						$('#submit-cadastro').removeClass('disabled');
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

        });
    });

   var form = $('#form_urpay_saque');
    console.log(form);
    form.submit(function(e) {
        $('html, body').animate({
			scrollTop : $("body").offset().top
        }, 1000);
        setTimeout(function() {
            $('#aguarde').slideDown();
        });
        setTimeout(function() {
			$('#submit-cadastro').toggleClass('disabled');
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
						$('#submit-saque').removeClass('disabled');
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
						$('#submit-saque').removeClass('disabled');
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
						$('#submit-saque').removeClass('disabled');
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

        });
    });

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