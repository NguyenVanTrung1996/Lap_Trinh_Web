var frm = $('#postComment');

frm.submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
            $('#comment_1').html(data);
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });

    $('#close-review-box').click();
});

function myFunction() {
    $rate1 = $('#input-send').val();
    $prd1 = $('#prd_1').val();
    $.ajax({
        headers:
            {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
        url: '/update_rate',
        type: 'GET',
        data: {
            rate1: $rate1,
            prd1: $prd1
        },
        success: function (data) {
            $('#return_rate').html(data);
        }

    });
}
