$(document).ready(function(){
    $('.navicon').on('click', function (e) {
        console.log('1');
        e.preventDefault();
        $(this).toggleClass('navicon--active');
        $('.toggle').toggleClass('toggle--active');
    })
});
