jQuery( document ).ready( function() {
    var selected_day = $( '.today' );
    $( selected_day ).animate( { height: 180, width: 180 }, 400 );
    $( '#selected_date' ).attr( 'value', $( selected_day ).find( 'input[name="my_date"]' ).val() );

    $(selected_day).find( 'ul[name="task_list"]' ).children().each( function( index, element ) {
        $( '#days_tasks' ).append( '<a href="">&times;</a> ' + $( element ).text() + '<br>' );
    } );

    $( '.day' ).on( 'click', function() {
        $( '#selected_date' ).val( $(this).find( 'input[name="my_date"]' ).val() );
        $( '#days_tasks' ).html( '' );
        if( selected_day )
        {
            $( selected_day ).animate( { height: 150, width: 150 }, 400 );
        }

        $(this).find( 'ul[name="task_list"]' ).children().each( function() {
            $( '#days_tasks' ).append( '<a href="">&times;</a> ' + $( this ).text() + '<br>' );
        } );
        
        selected_day = this;
        $( this ).animate( { height: 180, width: 180 }, 400 );
    } );

} );
