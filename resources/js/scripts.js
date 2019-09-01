$(document).ready(function () {
    if (Cookies.get('gdpr_cookie_bar') === '1') {
        $('#cookie-bar').addClass('d-none').removeClass('d-flex');
    } else {
        $('#cookie-bar').addClass('d-flex').removeClass('d-none');
    }

    $('[data-toggle="tooltip"]').tooltip();

    $('#cookie-bar-button').click(function () {
        Cookies.set('gdpr_cookie_bar', '1', {
            expires: 365
        });
        $('#cookie-bar').addClass('d-none').removeClass('d-flex');
    });

    $('.navbar-nav .nav-link').click(function () {
        $('.navbar-nav .nav-link').removeClass('active');
        $(this).addClass('active');
    });

    setTimeout(function () {
        $('.alert').fadeOut(750);
    }, 2500);

    $('.floating-label .custom-select, .floating-label .form-control').floatinglabel();
});
