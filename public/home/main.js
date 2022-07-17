$('.notice-nav').on('click', function() {
    $('.notification-container').slideToggle()
    $('.notification-icon').toggleClass('active')
})

$('.user-info__name').on('click', function (){
    $('.dropdown-menu__user-info').slideToggle();
})

$('[data-toggle="tooltip"]').tooltip()
