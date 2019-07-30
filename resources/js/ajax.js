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
            $('#search-partner-result').html(data.success.firstname);
        },
        error: function (errorMessage) {
            $('#search-partner-result').html('Error: ' + errorMessage);
        }
    });
});
