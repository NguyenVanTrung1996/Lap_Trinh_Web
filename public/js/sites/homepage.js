$(document).ready(function () {
    $('.navicon').on('click', function (e) {
        console.log('1');
        e.preventDefault();
        $(this).toggleClass('navicon--active');
        $('.toggle').toggleClass('toggle--active');
    });

    $('#image_target').attr('src');
    console.log($('#image_target').attr('src'));
    $('input[name=image_upload]').on('change', function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_target').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});

