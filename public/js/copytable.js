$(document).ready(function() {


    $('#tabla_lista').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     false,
        'columns': [
            null,   
            null,
            null,
            null,
            null,   
            null,  
            { 'searchable': false },
            { 'searchable': false }
        ]
    } );




} );


