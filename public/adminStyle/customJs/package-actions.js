'use strict';

let i = $('.fixed').length;
let x = $('.date').length;
let y = $('.hour').length;




$('body').on('click', '#customRadioMonth', function (e) {
    $('#fixed_type').show();
    $('#custom_type').hide();
    $('#range_period').hide();
})
$('body').on('click', '#customRadioHost', function (e) {
    $('#custom_type').show();
    $('#fixed_type').hide();
})
$('body').on('change', 'input[name="host_type"]', function (e) {
        $('#range_period').show();
        $('#fixed_type').hide();
})

function deleteFixedDiv(i) {
    $('#fixed_div_' + i).remove();
}

function deleteByDateDiv(i) {
    $('#byDate_div_' + i).remove();
}

function deleteByHourDiv(i) {
    $('#byHour_div_' + i).remove();
}

