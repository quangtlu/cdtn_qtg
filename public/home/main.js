$('.notice-nav').on('click', function() {
    $('.notice-list').slideToggle()
    $('.notice-icon').toggleClass('active')
})

$('.user-info__name').on('click', function (){
    $('.dropdown-menu__user-info').slideToggle();
})

$('[data-toggle="tooltip"]').tooltip()
