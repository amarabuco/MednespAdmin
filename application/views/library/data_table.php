
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

<script>
$(document).ready(function() {

    
    $('#tabela').DataTable(
        {
        //"order": [[ 1, "desc" ]],
        //"scrollY": 500,
        //"deferRender": true,
        //"scroller": true,
       "dom": 'Bfrtip',
        "stateSave": true,
        "columnDefs": [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        "buttons": [
            {
                extend: 'colvis',
                columns: ':not(.noVis)',
                text: 'Editar Colunas'
                
            },
             {
                extend: 'collection',
                text: 'Exportar', 
                 buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            },
        ],
    
    "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada foi encontrado",
             "search": "Busca:",
            "info": "Mostrando _START_ até _END_ do _TOTAL_ registros",
            "infoEmpty": "Sem registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
            "first":      "Primeiro",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
                        },
            "thousands":      ".",
            "decimal":        ","
        }
    }
    );
    
     $('#palestras').DataTable(
        {
        //"order": [[ 1, "desc" ]],
        //"scrollY": 500,
        //"deferRender": true,
        //"scroller": true,
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    
    "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada foi encontrado",
             "search": "Busca:",
            "info": "Mostrando _START_ até _END_ do _TOTAL_ registros",
            "infoEmpty": "Sem registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
            "first":      "Primeiro",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
                        },
            "thousands":      ".",
            "decimal":        ","
        }
    }
    );
    
    
    $('#favoritos').DataTable(
        {
        "order": [[ 1, "desc" ]],
        //"scrollY": 500,
        //"deferRender": true,
        //"scroller": true,
    
    "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada foi encontrado",
             "search": "Busca:",
            "info": "Mostrando _START_ até _END_ do _TOTAL_ registros",
            "infoEmpty": "Sem registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
            "first":      "Primeiro",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
                        },
            "thousands":      ".",
            "decimal":        ","
        }
    }
    );
    
    
    $('#favoritos_grupos').DataTable(
        {
        //"scrollY": 500,
        //"deferRender": true,
        //"scroller": true,
    
    "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada foi encontrado",
             "search": "Busca:",
            "info": "Mostrando _START_ até _END_ do _TOTAL_ registros",
            "infoEmpty": "Sem registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
            "first":      "Primeiro",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
                        },
            "thousands":      ".",
            "decimal":        ","
        }
    }
    );
    
     $('#usuarios').DataTable(
        {
        "order": [[ 1, "desc" ]],
        "scrollY": 500,
        "deferRender": true,
        "scroller": true,
    
    "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada foi encontrado",
             "search": "Busca:",
            "info": "Mostrando _START_ até _END_ do _TOTAL_ registros",
            "infoEmpty": "Sem registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
            "first":      "Primeiro",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
                        },
            "thousands":      ".",
            "decimal":        ","
        }
    }
    );
    
     $('#mural').DataTable(
        {
        "order": [[ 1, "desc" ]],
        "scrollY": 500,
        "deferRender": true,
        "scroller": true,

    
    "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada foi encontrado",
             "search": "Busca:",
            "info": "Mostrando _START_ até _END_ do _TOTAL_ registros",
            "infoEmpty": "Sem registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
            "first":      "Primeiro",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
                        },
            "thousands":      ".",
            "decimal":        ","
        }
    }
    );

    
} );

</script>