(function($){

    wp.customize( 'link_color', function( value ) {
        value.bind( function( newval ) {
            $('a').css('color', newval);
        } );
    } );

    wp.customize( 'phone', function( value ) {
        value.bind( function( newval ) {
            $('.phone span').text(newval);
        } );
    } );

})(jQuery);