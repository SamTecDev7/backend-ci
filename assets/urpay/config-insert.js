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
    var form = $('#form');
    form.submit(function(e) {
        $('html, body').animate({
			scrollTop : $("body").offset().top
		}, 1000);
        setTimeout(function() {
            $('#aguarde').toggle();
        });
        setTimeout(function() {
			$('#submit').toggleClass('disabled');
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
                    console.log("OK");
                    
                    setTimeout(function() {
						$('#aguarde').fadeOut('slow');
					}, 1000);
					setTimeout(function() {
						$('#submit').removeClass('disabled');
					});

					//toastr.success(json.alerta_form);
					setTimeout(function() {
						$('#alerta').fadeIn('slow');
					}, 1000);
					$('html, body').animate({
						scrollTop : 0
					}, 1000);
					setTimeout(function() {
						$('#alerta').slideUp('slow');
                    }, 5000);
                    $('#resposta').html(json.alerta_form);
                    location.reload();
                    
                }

                if (json.controller == 3) {
                    setTimeout(function() {
						$('#aguarde').slideUp('slow');
                    }, 500);
                    setTimeout(function() {
						$('#submit').removeClass('disabled');
                    });
                    setTimeout(function() {
						$('#alerta_erro').fadeIn('slow');
					}, 1000);
					$('html, body').animate({
						scrollTop : 0
					}, 1000);
					setTimeout(function() {
						$('#alerta_erro').slideUp('slow');
					}, 10000);
					$('#resposta_erro').html(json.alerta_form);
                }

            }
        });
    }); 

});

function showDivLink(div) {
    document.getElementById("1").className = "blocked";
    document.getElementById("2").className = "blocked";

    document.getElementById(div).className = "view";
}

$(function() {
    $("#edit").click( function()
         {
           console.log("entramos no click");
           document.getElementById("form-edit").className = "panel view";
           document.getElementById("session-hab").className = "panel blocked";
           document.getElementById("1").className = "view";
           $("#urpay_hab_api").val(selectHab);
         }
    );

    $("#hab").click( function()
         {
           console.log("entramos no click");
           document.getElementById("form-edit").className = "panel view";
           document.getElementById("session-desabilitado").className = "panel blocked";
           document.getElementById("1").className = "view";
           $("#urpay_hab_api").val(1);
         }
    );
});

$('#urpay_valor_mimimo').mask('#.##0,00', {reverse: true});
$('#urpay_valor_desconto').mask('##0,00%', {reverse: true});


