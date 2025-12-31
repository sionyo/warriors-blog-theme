/**
 * Warriors Blog Theme JavaScript
 */

jQuery(document).ready(function($) {
    'use strict';
    
    // Smooth scrolling for anchor links
    $('a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });
    
    // Back to top button
    var backToTop = $('<button/>', {
        id: 'back-to-top',
        html: '<i class="bi bi-chevron-up"></i>',
        title: 'Back to top',
        class: 'btn btn-primary'
    }).appendTo('body');
    
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    
    $('#back-to-top').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
    });
    
    // Style back to top button
    $('#back-to-top').css({
        'position': 'fixed',
        'bottom': '20px',
        'right': '20px',
        'display': 'none',
        'z-index': '1000',
        'width': '45px',
        'height': '45px',
        'border-radius': '50%',
        'padding': '0'
    });
    
    // Mobile menu improvements
    $('.dropdown-toggle').on('click', function(e) {
        if ($(window).width() < 992) {
            e.preventDefault();
            $(this).parent().toggleClass('show');
            $(this).next('.dropdown-menu').slideToggle(300);
        }
    });
    
    // Post image lightbox effect
    $('.post-content img').addClass('img-fluid rounded').wrap('<div class="post-image-container"></div>');
    
    // Add hover effect to blog posts
    $('.blog-post').on('mouseenter', function() {
        $(this).css('transform', 'translateY(-5px)');
    }).on('mouseleave', function() {
        $(this).css('transform', 'translateY(0)');
    });
    
    // Form validation
    $('#commentform').on('submit', function() {
        var required = $(this).find('[required]');
        var valid = true;
        
        required.each(function() {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                valid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        
        return valid;
    });
});