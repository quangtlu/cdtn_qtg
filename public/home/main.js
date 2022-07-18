import {alertMessage} from '../js/alert.js';

$('.notification-icon').on('click', function() {
    $('.notification-container').slideToggle()
    $(this).toggleClass('active')
})

$('.user-info__name').on('click', function (){
    $('.dropdown-menu__user-info').slideToggle();
})

$('[data-toggle="tooltip"]').tooltip()

$('.read-all-noti-link').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: $(this).attr('href'),
        dataType: "json",
        success: function (response) {
            alertMessage(response.message, 'success')
            $('.notice-list li').removeClass('unread');
            $('.notification-icon').removeClass('bell');
            $('.number-notification').hide();
        }
    });
});

$('.remove-all-noti-link').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: $(this).attr('href'),
        dataType: "json",
        success: function (response) {
            let noNotiImg = $('.notice-nav').data('noimg')
            alertMessage(response.message, 'success')
            $('.notification-icon').removeClass('bell');
            $('.number-notification').hide();
            $('#has-notification').slideUp();
            $('#has-notification').remove();
            $('.notice-nav').append(`
                <div class="notification-container animate__animated animate__fadeIn">
                    <img class="no-notification-img" src="${noNotiImg}" alt="">
                    <h4 style="padding: 10px 0" class="active">Bạn không có thông báo nào</h4>
                </div>
            `)
            $('.notification-container').slideDown();
        }
    });
});

function actionDeletePost() {
    let urlRequest = $(this).data('url');
    let that = $(this)
    Swal.fire({
        title: 'Bạn có chắc muốn xóa bài viết này?',
        text: "Bạn sẽ không thể khôi phục bài viết này",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (res) {
                    that.closest('.wthree-top-1').fadeOut()
                    alertMessage(res.message, 'success')
                },
                error: function(errors) {
                    let message = errors.responseJSON.errors.message
                    alertMessage(message, 'error')
                }
            })

        }
    })
}

function actionDeleteComment() {
    let urlRequest = $(this).data('url');
    let that = $(this)
    Swal.fire({
        title: 'Bạn có chắc muốn xóa bình luận này?',
        text: "Bạn sẽ không thể khôi phục bình luận này",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (res) {
                    that.closest('.comments-grid').fadeOut()
                    alertMessage(res.message, 'success')
                },
                eerror: function(errors) {
                    let message = errors.responseJSON.errors.message
                    alertMessage(message, 'error')
                }
            })

        }
    })
}

$(function () {
    const messageSuccess = $('#container').attr('data-messageSuccess')
    const messageError = $('#container').attr('data-messageError')
    if(messageSuccess) {
        alertMessage(messageSuccess, 'success')
    }
    if(messageError) {
        alertMessage(messageError, 'error')
    }
    $(document).on('click', '.btn-delete', actionDeletePost)
    $(document).on('click', '.btn-delete-comment', actionDeleteComment)
})
