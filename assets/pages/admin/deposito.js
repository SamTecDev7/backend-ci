$(document).ready(function(){
    
    if($('.responsive-data-table')[0]){

        $('.responsive-data-table').DataTable({
            "PaginationType": "bootstrap",
            "ordering": false,
            responsive: true,
            dom: '<"tbl-top clearfix"lfr>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Desculpe, nada encontrado.",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrados",
                "infoFiltered": "(filtrado de _MAX_ registros)",
                "search": "Pesquisar:",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "emptyTable": "Nenhum registro para exibir nessa página",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": Ativado para ordenar colunas crescentes",
                    "sortDescending": ": Ativado para ordenar colunas decrescente"
                }
            }
        });

    }


    $(document).on('change', 'input[name="tipo"]', function(){

        let categoria_conta = $('input[name="tipo"]:checked').val();

        if(categoria_conta == 1){

            $('#box_bitcoin').css('display', 'none');
            $('#box_conta_bancaria').css('display', 'flex');
        }else{
            $('#box_bitcoin').css('display', 'flex');
            $('#box_conta_bancaria').css('display', 'none');
        }
    });

}); /* ready */