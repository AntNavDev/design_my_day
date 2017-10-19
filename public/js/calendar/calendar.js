jQuery( document ).ready( function() {
    var last_click = $( '.today' );
    $( last_click ).animate( { height: 180, width: 180 }, 400 );
    $( '.day' ).on( 'click', function() {
        if( last_click )
        {
            $( last_click ).animate( { height: 150, width: 150 }, 400 );
        }
        
        last_click = this;
        $( this ).animate( { height: 180, width: 180 }, 400 );
    } );
} );
