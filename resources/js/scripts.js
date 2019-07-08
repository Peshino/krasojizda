$(document).ready(function () {
    if (Cookies.get('gdpr_cookie_bar') === '1') {
        $('#cookie-bar').addClass('d-none').removeClass('d-flex');
    } else {
        $('#cookie-bar').addClass('d-flex').removeClass('d-none');
    }

    $('[data-toggle="tooltip"]').tooltip();

    $('#cookie-bar-button').click(function () {
        Cookies.set('gdpr_cookie_bar', '1');
        $('#cookie-bar').addClass('d-none').removeClass('d-flex');
    });
});
