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
            let partnerId = data.user.id,
                partnerName = data.user.fullname,
                status = data.status,
                message = data.message;

            $('#search-partner-result').addClass('d-block').removeClass('d-none');

            if (status === 'success') {
                $('#receiver-id').val(partnerId);
                $('#receiver-name').html(partnerName);
            } else {
                $('#receiver-name').html(message);
            }
        },
        error: function (errorMessage) {
            $('#search-partner-result').html('Error: ' + errorMessage);
        }
    });
});
