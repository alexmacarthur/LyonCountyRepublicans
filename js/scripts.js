$('body').removeClass('no-js');

$( document ).ready(function(){
    initMobileMenu();
    subMenuManagement();
    $('.nav-links').dropit({
        action: 'mouseenter'
    });
});

window.onresize = function(){
    initMobileLinkResize();
}

function isEI() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
        return true;
    else      
        return false;
}

// submenu hover
function subMenuManagement(){
    if(window.innerWidth > 768){

        // // show the submenus on hover
        // (function(){
            
        //     // clear styles if resizing from smaller screen 
        //     $('.nav-links').attr('style', '');
        //     $('.sub-menu').parent().children('a').removeClass('dropdown-arrow');

        //     $('.nav-links li').mouseover(function(){
        //         $(this).children('.sub-menu').show();
        //     }).mouseout(function(){

        //        $(this).children('.sub-menu').hide();
        //        var submenu = $(this).children('.sub-menu');
                
        //        var timeout = setTimeout(function(){ submenu.hide(); }, 500);

        //        $('.nav-links li').mouseover(function(){
        //             $(this).children('.sub-menu').show();
        //         }).mouseout(function(){

        //             // var timeout = setTimeout(function(){ submenu.hide(); }, 500);

        //         });

        //     });
        // })();

    } else {

        $('.mobile-menu-holder').css('height', $(document).height());

        (function(){
            var linksHeight = $('.nav-links').height(),
            windowHeight = $(window).height();
            console.log('links height:' + linksHeight);
            console.log('window height:' + windowHeight);
            $('.nav-links').css('margin-top', (windowHeight-linksHeight)/2);
        })();
    
        // add arrow to link items with submenus
        $('.sub-menu').parent().children('a').addClass('dropdown-arrow');

        // show the submenus when clicked
        (function(){
            $('.nav-links li').click(function(){
            $(this).children('.sub-menu').toggle();
            });
        })();

    }
}

function initMobileMenu(){
    $('#mobile-menu-toggle').click(function(){
        if($('.nav-links').hasClass('open-mobile-menu')){
            $('.nav-links').removeClass('open-mobile-menu');
            $('html').removeClass('overflow-hidden');
        }else{
            $('.nav-links').addClass('open-mobile-menu');
            $('html').addClass('overflow-hidden');
        }
    });
    
    $('#close-mobile-menu').click(function(){
        $('.nav-links').removeClass('open-mobile-menu');
        $('html').removeClass('overflow-hidden');
    });
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
