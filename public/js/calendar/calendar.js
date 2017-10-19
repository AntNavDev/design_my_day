jQuery( document ).ready( function() {
    var last_click = $( '.today' );
    $( last_click ).animate( { 'zoom': 1.2 }, 400 );
    $( '.day' ).on( 'click', function() {
        if( last_click )
        {
            $( last_click ).animate( { 'zoom': 1 }, 400 );
        }
        
        last_click = this;
        $( this ).animate( { 'zoom': 1.2 }, 400 );
    } );
} );
