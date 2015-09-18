$('body').removeClass('no-js');

$( document ).ready(function(){
    // because at least item is created in the DOM by jQuery, these MUST be in this order.
    subMenuManagement();
    initMobileMenu();
});

window.onresize = function(){
    // because at least item is created in the DOM by jQuery, these MUST be in this order.
    subMenuManagement();
    initMobileMenu();
}

function isEI() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
        return true;
    else      
        return false;
}

function initMobileMenu(){

    $('#mobile-menu-toggle').click(function(){

        // if it has this class, it's already open, so close it
        if($('.nav-links-holder').hasClass('open-mobile-menu')){

            //alert('hi');
            console.log('hi');
            // remove overflow-hidden so full page can be used
            $('html').removeClass('overflow-hidden');

            // remove the class that keeps it open
            $('.nav-links-holder').removeClass('open-mobile-menu');

        // if it doesn't, it's already closed, so open it
        }else{

            // set overflow-hidden so user can't scroll all over
            $('html').addClass('overflow-hidden');

            // add the class that keeps it open
            $('.nav-links-holder').addClass('open-mobile-menu');
        }

    });
    
    // closing the mobile menu
    $('#mobile-menu-close').click(function(){

        // remove the class that keeps it open
        $('.nav-links-holder').removeClass('open-mobile-menu');

        // remove overflow-hidden so full page can be used
        $('html').removeClass('overflow-hidden');
    });
} 

// submenu hover
function subMenuManagement(){

    $('#mobile-menu-close').remove();

    //disables links that have sub menus
    $('.sub-menu').parent('li').children('a').click(function(e){
        //e.preventDefault();
    });

    if(window.innerWidth > 650){

        // clean HTML inline styles
        $('html').attr('style', '');

        // set the dropdown open action to hover
        $('.nav-links').dropit({
            action: 'mouseenter'
        });

        // show the submenus on hover
        (function(){
            
            // clear styles if resizing from smaller screen 
            $('.nav-links').attr('style', '');
            $('.sub-menu').parent().children('a').removeClass('dropdown-arrow');

        })();

    } else {

        // set the dropdown open action to hover
        $('.nav-links').dropit({
            action: 'click'
        });

        // append the 'X' to close the mobile menu
        $('.nav-links-holder').append("<div id='mobile-menu-close'><i class='fa fa-times'></i></div>");

        // position the links in the center of the screen, vertically
        (function(){
            var linksHeight = $('.nav-links').height(),
            windowHeight = $(window).height();
            $('.nav-links').css('margin-top', ((windowHeight-linksHeight)/2)-25);
        })();
    
        // append arrow to link items with submenus
        $('.sub-menu').parent().children('a').addClass('dropdown-arrow');

    }
}

/* ajax contact form */
$(function() {

    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function(response) {
            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('error');
            $(formMessages).addClass('success');

            // Set the message text.
            $(formMessages).text("Your message was successfully sent.");

            // Clear the form.
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
            $('#phonenumber').val('');
            $('#citystate').val('');

        })
        .fail(function(data) {
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');
            $(formMessages).text("Oops! An error occured and your message could not be sent.");

            // Set the message text.
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occured and your message could not be sent.');
            }
        });

    });

});

// (function($) {

//       /**
//        * Copyright 2012, Digital Fusion
//        * Licensed under the MIT license.
//        * http://teamdf.com/jquery-plugins/license/
//        *
//        * @author Sam Sehnert
//        * @desc A small plugin that checks whether elements are within
//        *     the user visible viewport of a web browser.
//        *     only accounts for vertical position, not horizontal.
//        */

//         $.fn.visible = function(partial) {
        
//           var $t            = $(this),
//               $w            = $(window),
//               viewTop       = $w.scrollTop(),
//               viewBottom    = viewTop + $w.height(),
//               _top          = $t.offset().top,
//               _bottom       = _top + $t.height(),
//               compareTop    = partial === true ? _bottom : _top,
//               compareBottom = partial === true ? _top : _bottom;
        
//         return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

//       };

// })(jQuery);

// when scrolling, checks if element is visible. if visibile, fade in.
// $(window).scroll(function(event) {

//     $(".aim-icon").each(function(i, element) {
//         var element = $(element);
//         if (element.visible(true)) {
//           element.addClass("bounce"); 
//         } 
//     });

// });
