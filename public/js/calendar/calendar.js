jQuery( document ).ready( function() {
    var selected_day = $( document ).find( '.today' )[ 0 ];
    
    if( selected_day == null )
    {
        var placeholder = $( document ).find( 'input[name="my_date"]' )[ 0 ];
        selected_day = $( placeholder ).parent();
    }

    $( selected_day ).animate( { height: 180, width: 180 }, 400 );
    $( '#selected_date' ).attr( 'value', $( selected_day ).find( 'input[name="my_date"]' ).val() );

    if( selected_day )
    {
        $( '#viewed_day' ).html( 'Tasks for ' + $( selected_day ).find( 'span[name="my_day_of_week"]' ).text() + ' the ' +  appendSuffix( $( selected_day ).find( 'span[name="my_day_number"]' ).text() ) + ':' );
    }
    else
    {
        $( '#viewed_day' ).html( 'No Day Selected' );
    }

    $( selected_day ).find( 'ul[name="task_list"]' ).children().each( function( index, element ) {
            $( '#days_tasks' ).append( '<div class="task_info"><input type="hidden" name="task_id" value="' + $( element ).find( 'input[name="task_id"]' ).val() + '"><button type="button" class="delete_task" onclick="return confirm(\'Are you sure that you want to delete this task?\');">&times;</button> ' + $( element ).find( 'li[name="task_description"]' ).text() + '</div><br>' );
    } );

    $( '.day' ).on( 'click', function() {
        $( '#selected_date' ).val( $(this).find( 'input[name="my_date"]' ).val() );
        $( '#days_tasks' ).html( '' );
        if( selected_day )
        {
            $( selected_day ).animate( { height: 150, width: 150 }, 400 );
        }

        $( '#viewed_day' ).html( 'Tasks for ' + $( this ).find( 'span[name="my_day_of_week"]' ).text() + ' the ' +  appendSuffix( $( this ).find( 'span[name="my_day_number"]' ).text() ) + ':' );

        $(this).find( 'ul[name="task_list"]' ).children().each( function() {
            $( '#days_tasks' ).append( '<div class="task_info"><input type="hidden" name="task_id" value="' + $( this ).find( 'input[name="task_id"]' ).val() + '"><button type="button" class="delete_task" onclick="return confirm(\'Are you sure that you want to delete this task?\');">&times;</button> ' + $( this ).find( 'li[name="task_description"]' ).text() + '</div><br>' );
        } );
        
        selected_day = this;
        $( this ).animate( { height: 180, width: 180 }, 400 );
    } ); // End of on-click for .day class

    $( '#days_tasks' ).on( 'click', '.delete_task', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            }
        });
        $.ajax({
            type: 'POST',
            success: function(data){
                console.log('Success!');
                location.reload();
            },
            error: function(error, err_str){
                console.log(error);
                console.log(err_str);
            },
            url: '/delete-task',
            data: {
                id: $( this ).parent().find( 'input[name="task_id"]' ).val()
            }
        }); // End of ajax call
    } ); // End of delete_task on click

    $( 'div.alert' ).delay( 2000 ).slideUp( 300 );

} ); // End of jQuery.( document ).ready();

function appendSuffix( num )
{
    var ret = num;
    // Used 10 and 20 as loose constraints to easily understand what code is doing. (If you're not one to read comments)
    // First if() is used to add the approriate suffix to all numbers not ending in 1, 2 or 3. 11, 12, 13 are exceptions to this.
    // Second if() appends all numbers ending with 1, 2, or 3 with the appropriate suffix
    if( ( num.substr(-1) > 3 || num.substr(-1) == 0 ) || ( num > 10 && num < 20 ) )
    {
        ret += 'th';
    }
    else if( ( ( num > 0 && num < 10 ) || num > 20 ) )
    {
        if( num.substr(-1) == 1 )
        {
            ret += 'st';
        }
        else if( num.substr(-1) == 2 )
        {
            ret += 'nd';
        }
        else if( num.substr(-1) == 3 )
        {
            ret += 'rd';
        }
    }

    return ret;
}
