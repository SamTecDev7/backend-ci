$(document).ready(function () {
    
    if ($('#datatable')) {
        
        $('#datatable').DataTable({
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "responsive": true,
            "language": {
                
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Desculpe, nada encontrado.",
                "search": "Pesquisar:",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "emptyTable": "Nenhum registro para exibir nessa página",
                "paginate": {
                    "first": "Primeira",
                    "last": "Última",
                    "next": "Próxima",
                    "previous": "Anterior"
                },
                
                "aria": {
                    "sortAscending": ": Ativado para ordenar colunas crescentes",
                    "sortDescending": ": Ativado para ordenar colunas decrescente"
                }
            }
        });
        
    }

});