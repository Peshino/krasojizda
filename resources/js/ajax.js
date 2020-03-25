$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('form#search-partner-form').submit(function (e) {
    e.preventDefault();

    var searchPartnerInputValue = $('input[name=search_partner_input]').val(),
        form = $(this),
        url = form.attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            search_partner_input: searchPartnerInputValue
        },
        success: function (data) {
            let status = data.status,
                message = data.message;

            $('#search-partner-result').addClass('d-block').removeClass('d-none');

            if (status === 'success') {
                let partnerId = data.user.id,
                    partnerName = data.user.fullname;

                $('#receiver-id').val(partnerId);
                $('#receiver-name').html(partnerName);
                $('#invite-partner-to-krasojizda-button').addClass('d-block').removeClass('d-none');
            } else {
                $('#receiver-name').html(message);
                $('#invite-partner-to-krasojizda-button').addClass('d-none').removeClass('d-block');
            }
        },
        error: function (errorMessage) {
            $('#search-partner-result').html('Error: ' + errorMessage.responseJSON.message);
        }
    });
});

$('form#invitation-result-form').submit(function (e) {
    e.preventDefault();

    var confirmatorId = $('#confirmator-id').val(),
        form = $(this),
        url = form.attr('action');

    $.ajax({
        type: 'PATCH',
        url: url,
        data: {
            confirmator_id: confirmatorId
        },
        success: function (data) {
            let status = data.status;

            if (status === 'success') {
                $('#invitation-result').remove();
            } else {
                $('#invitation-result').html('error');
            }
        },
        error: function (errorMessage) {
            $('#invitation-result').html('Error: ' + errorMessage.responseJSON.message);
        }
    });
});
