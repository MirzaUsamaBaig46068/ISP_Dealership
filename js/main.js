(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Hero Header carousel
    $(".header-carousel").owlCarousel({
        //animateOut: 'slideOutLeft',
        items: 1,
        autoplay: true,
        smartSpeed: 1000,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
    });

    // International carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        items: 1,
        smartSpeed: 1500,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ]
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        //console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })

        $('#email-form').on('submit', async function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            for (let [key, value] of formData.entries()) {
                console.log(key, value);
            }
            try {
                const [visitorResponse, internalTeamResponse] = await Promise.all([
                    fetch('https://directstreamone.com/v1/send-email-to-visitor.php', {
                        method: 'POST',
                        body: formData
                    }),
                    fetch('https://directstreamone.com/v1/send-email-to-internal-team.php', {
                        method: 'POST',
                        body: formData
                    })
                ]);

                if (!visitorResponse.ok || !internalTeamResponse.ok) {
                    throw new Error('One or both network responses were not ok');
                }

                const visitorData = await visitorResponse.text();
                const internalTeamData = await internalTeamResponse.text();

                const toastLiveExample = document.querySelector('.toast');
                const toastBody = document.querySelector('.toast-body');

                // Update the toast message content based on both responses
                if (visitorResponse.ok && internalTeamResponse.ok) {
                    localStorage.setItem('success', true);
                    toastBody.textContent = 'Email has been sent!';
                } else {
                    toastBody.textContent = 'One or both emails sending failed.';
                }
                this.reset();
                // Show the toast notification
                const toastBootstrap = new bootstrap.Toast(toastLiveExample);
                toastBootstrap.show();
            } catch (error) {
                console.error('There has been a problem with your fetch operation:', error);
                window.alert('Email sending failed. Please try again later.');
            }
        });
    });


    // testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });



    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1000, 'easeInOutExpo');
        return false;
    });
})(jQuery);

function toast(Message) {
    const toastLiveExample = document.querySelector('.toast');
    const toastBody = document.querySelector('.toast-body');
    toastBody.textContent = Message;
    const toastBootstrap = new bootstrap.Toast(toastLiveExample);
    toastBootstrap.show();
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en'
    }, 'google_translate_element');
}

function translatePage(language) {
    var translateElement = document.querySelector('.goog-te-combo');
    if (translateElement) {
        translateElement.value = language;
        translateElement.dispatchEvent(new Event('change'));
    }
}