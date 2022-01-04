$(document).ready(function() {

    var offcanvasTogglerIcon = $('.offcanvas-toggler-icon');
    var offcanvasMenu = $('.offcanvas-menu');

    // main menu toggler icon (Mobile site only)
    $('[data-toggle="navbarToggler"]').on("click", function () {
        navbar.toggleClass('active');
        $('body').toggleClass('nav--open');
    });

    // Offcanvas toggler  
    $('.offcanvas-toggler').on("click", function () {
        offcanvasTogglerIcon.toggleClass('active');
        offcanvasMenu.toggleClass('offcanvas-menu--open');
    });

    /* ---------------------------------------------
    canvas/ Sidebar menu
    --------------------------------------------- */
    (function () {
        var menuEl = document.getElementById('ml-menu');
        if (menuEl) {
            var mlmenu = new MLMenu(menuEl, {
                breadcrumbsCtrl: false,
                backCtrl: true,
                onItemClick: loadDummyData
            });
        }
        // mobile menu toggle

        var openMenuCtrl = document.querySelector('.action--open');
        if (openMenuCtrl) {
            openMenuCtrl.addEventListener('click', openMenu);

            function openMenu() {
                classie.toggle(menuEl, 'menu--open');
            }
        }

        // simulate grid content loading
        var gridWrapper = document.querySelector('.content');

        function loadDummyData(ev, itemName) {}
    })();

    $('.menu__link').click(function (){
        offcanvasMenu.toggleClass('offcanvas-menu--open');
        offcanvasTogglerIcon.toggleClass('active');
    })
       $('#progressbar1').LineProgressbar({
            percentage: 87,
            fillBackgroundColor: '#fbc25e',
            height: '5px',
            width: '90%',
            radius: '10px'
        });
       $('#progressbar2').LineProgressbar({
            percentage: 84,
            fillBackgroundColor: '#fbc25e',
            height: '5px',
            width: '90%',
            radius: '10px'
        });
       $('#progressbar3').LineProgressbar({
            percentage: 82,
            fillBackgroundColor: '#fbc25e',
            height: '5px',
            width: '90%',
            radius: '10px'
        });
       $('#progressbar4').LineProgressbar({
            percentage: 79,
            fillBackgroundColor: '#fbc25e',
            height: '5px',
            width: '90%',
            radius: '10px'
        });

     /* ---------------------------------------------
    Homepage Portfolio carousel
    --------------------------------------------- */
    var swiper = new Swiper('.portfolio .swiper-container', {
        allowTouchMove: true,
        preventClicks: true,
        slidesPerView: 4,
        spaceBetween: 20,
        slidesPerGroup: 1,
        grabCursor: true,
        calculateHeight: true,
        simulateTouch: true,
        keyboard: true,
        loop: true,
        loopFillGroupWithBlank: true,
        centeredSlides: false,
        speed: 1000,

        scrollbar: {
            el: '.swiper-scrollbar',
            clickable: true,
            hide: false,
            snapOnRelease: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            1920: {
                slidesPerView: 3,
            },
            767: {
                autoHeight: true,
                allowTouchMove: true,
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 1,
                scrollbar: {
                    el: '.swiper-pagination',
                    clickable: true,
                    hide: true,

                },

            }
        },

    });
   /* ---------------------------------------------
    Testimonial carousel
    --------------------------------------------- */
    var swiper = new Swiper('.testimonial .swiper-container', {
        slidesPerView: 3,
        spaceBetween: 25,
        speed: 500,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 1,
            },
        }
    });
    $('.client_form').submit(function (e){
        e.preventDefault();
        var client_name = $('#client_name').val();
        var client_phone = $('#client_phone').val();
        var client_email = $('#client_email').val();
        var client_text = $('#client_text').val();
        var contact_btn = $('#contact_btn').val();
        $.ajax({
            url: 'includes/contact.php',
            method: 'POST',
            data: {
                client_name: client_name,
                client_phone: client_phone,
                client_email: client_email,
                client_text: client_text,
                contact_btn: contact_btn
            },
            beforeSend: function (){
                $('#errorSection').html('Processing...');
            },
            success:function (data){
                $('#errorSection').html(data);
            }
        })
        
    })

});
(function (document, $) {

    var $scrollElement = (function () {
        // Find out what to scroll (html or body)
        var $html = $(document.documentElement),
            $body = $(document.body),
            bodyScrollTop;
        if ($html.scrollTop()) {
            return $html;
        } else {
            bodyScrollTop = $body.scrollTop();
            // If scrolling the body doesn’t do anything
            if ($body.scrollTop(bodyScrollTop + 1).scrollTop() == bodyScrollTop) {
                return $html;
            } else {
                // We actually scrolled, so undo it
                return $body.scrollTop(bodyScrollTop);
            }
        }
    }());

    $.fn.smoothScroll = function (speed) {
        speed = ~~speed || 400;
        // Look for links to anchors (on any page)
        return this.find('a[href*="#"]').click(function (event) {
            var hash = this.hash,
                $hash = $(hash); // The in-document element the link points to
            // If it’s a link to an anchor in the same document
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                // If the anchor actually exists…
                if ($hash.length) {
                    // …don’t jump to the link right away…
                    event.preventDefault();
                    // …and smoothly scroll to it
                    $scrollElement.stop().animate({
                        'scrollTop': $hash.offset().top
                    }, speed, function () {
                        location.hash = hash;
                    });
                }
            }
        }).end();
    };

}(document, jQuery));

$('html').smoothScroll();
$('html').smoothScroll(1200);

