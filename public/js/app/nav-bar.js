jQuery( document ).ready( function() {

    var days_to_sunday = {
        'Sunday': 0,
        'Monday': 1,
        'Tuesday': 2,
        'Wednesday': 3,
        'Thursday': 4,
        'Friday': 5,
        'Saturday': 6,
    };

    // Go To Week View Button
    $( '#week_view_link' ).on( 'click', function( event ) {
        event.preventDefault();
        var redirect = $( this ).attr( 'href' ).split( '/', 5 ).join( '/' );
        redirect += '/';
        
        var selected_day = $( '.current_selection' );

        var day_name = $( selected_day ).find( 'span[name="my_day_of_week"]' ).text();
    
        redirect += ( $( selected_day ).find( 'span[name="my_day_number"]' ).text() - days_to_sunday[ day_name ] );
        redirect += '/';
        redirect +=  $( '#current_increment' ).val();
        redirect += '/';
        redirect +=  $( '#current_year' ).text();

        window.location.href = redirect;
        
    } );

} );
