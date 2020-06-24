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

    wp.customize( 'show_phone', function( value ) {
        value.bind( function( newval ) {
            false === newval ? $('.phone').fadeOut() : $('.phone').fadeIn();
        } );
    } );

})(jQuery);