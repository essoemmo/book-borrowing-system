'use strict';


$('#actionDone').css('display', 'none');
$('#basic-default-country').on('change', function (e) {
    if ($(e.target).val() == 2) {
        $('#actionDone').css('display', 'flex');
    } else {
        $('#actionDone').css('display', 'none');
    }
})

$('#cityData').on('change', function (e) {
    let cityId = e.target.value;
    let url = $(this).data('url');
    $.ajax({
        url: url,
        type: "POST",
        data: {
            'cityId': cityId
        },
        success: function (data) {
            if (data) {
                $('#state').empty();
                $.each(data.states, function (index, value) {
                    $('#state').append('<option value="' + value.id + '">' + value.title + '</option>');
                })
            } else {
                $("#state").empty();
            }
        }
    })
});

