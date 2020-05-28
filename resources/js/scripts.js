$(document).ready(() => {
    if (Cookies.get('gdpr_cookie_bar') === '1') {
        $('#cookie-bar').addClass('d-none').removeClass('d-flex');
    } else {
        $('#cookie-bar').addClass('d-flex').removeClass('d-none');
    }

    $('[data-toggle="tooltip"]').tooltip();

    $('#cookie-bar-button').click(() => {
        Cookies.set('gdpr_cookie_bar', '1', {
            expires: 365
        });
        $('#cookie-bar').addClass('d-none').removeClass('d-flex');
    });

    $('.navbar-nav .nav-link').click(() => {
        $('.navbar-nav .nav-link').removeClass('active');
        $(this).addClass('active');
    });

    setTimeout(() => {
        $('.alert').fadeOut(750);
    }, 2500);

    $('.floating-label .custom-select, .floating-label .form-control').floatinglabel();

    if ($('body textarea').length) {
        const textareaId = $('body textarea').attr('id');
        const $textarea = $('#' + textareaId);
        const $div = $textarea.closest('div');

        if (localStorage.getItem(textareaId) !== null) {
            $textarea.val(localStorage.getItem(textareaId));

            if ($textarea.val().length > 0) {
                $div.addClass('has-value');
            } else {
                $div.removeClass('has-value');
            }
        }

        $textarea.on('input', (event) => {
            localStorage.setItem(textareaId, $textarea.val())
        });

        $('body form').submit((event) => {
            const $inputs = $('body form textarea');
            $inputs.each((item) => {
                localStorage.removeItem($inputs[item].id);
            });
        });
    }
});
