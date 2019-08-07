$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('form#search-partner-form').submit(function (e) {
    e.preventDefault();

    var searchPartnerInputValue = $('input[name=search_partner_input]').val();

    $.ajax({
        type: 'POST',
        url: '/searchPartnerAjaxPost',
        data: {
            search_partner_input: searchPartnerInputValue
        },
        success: function (data) {
            let partnerName = data.user.firstname + ' ' + data.user.lastname;
            let partnerEmail = data.user.email;

            $('#search-partner-result').addClass('d-block').removeClass('d-none');
            $('#search-partner-name').html(partnerName);
            $('#search-partner-email').html(partnerEmail);
        },
        error: function (errorMessage) {
            $('#search-partner-result').html('Error: ' + errorMessage);
        }
    });
});
