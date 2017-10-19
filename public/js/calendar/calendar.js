jQuery( document ).ready( function() {
    var last_click = $( '.today' );
    $( last_click ).animate( { height: 180, width: 180 }, 400 );
    
    $( '.day' ).on( 'click', function() {
        $( '#selected_date' ).val( $(this).find( 'input[name="my_date"]' ).val() );
        $( '#days_tasks' ).html( '' );
        if( last_click )
        {
            $( last_click ).animate( { height: 150, width: 150 }, 400 );
        }

        $(this).find( 'ul[name="task_list"]' ).children().each( function() {
            $( '#days_tasks' ).append( '<a href="">&times;</a> ' + $( this ).text() + '<br>' );
        } );
        
        last_click = this;
        $( this ).animate( { height: 180, width: 180 }, 400 );
    } );

} );
