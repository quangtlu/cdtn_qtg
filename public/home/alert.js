const time = 3000
const position = 'top'
const dataSuccess = {
    icon: 'success',
    message: $('#container').attr('data-messageSuccess'),
    color: '#fff',
    background: '#21ba45',
}
const dataError = {
    icon: 'error',
    message: $('#container').attr('data-messageError'),
    color: '#000',
    background: '#fff',
}

$(function () {

    if (dataSuccess.message != '' || dataError.message != '') {
        Swal.fire({
            toast: true,
            icon: dataSuccess.message != '' != '' ? dataSuccess.icon : dataError.icon,
            title: dataSuccess.message != '' ? dataSuccess.message : dataError.message,
            position: position,
            timer: time,
            showConfirmButton: false,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            background: dataSuccess.message != '' ? dataSuccess.background : dataError.background,
            color: dataSuccess.message != '' ? dataSuccess.color : dataError.color,
        });
    }
    $(document).on('click', '.btn-delete', actionDeletePost)
    $(document).on('click', '.btn-delete-comment', actionDeleteComment)

})

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
                success: function (data) {
                    if (data.status = 200) {
                        that.closest('.wthree-top-1').fadeOut()
                        Swal.fire({
                            toast: true,
                            icon: dataSuccess.icon,
                            title: "Bài viết đã được xóa",
                            position: position,
                            timer: time,
                            showConfirmButton: false,
                            background: dataSuccess.background,
                            color: dataSuccess.color,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        })
                    }
                },
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
                success: function (data) {
                    if (data.status = 200) {
                        that.closest('.comments-grid').fadeOut()
                        Swal.fire({
                            toast: true,
                            icon: dataSuccess.icon,
                            title: "Bình luận đã được xóa",
                            position: position,
                            timer: time,
                            showConfirmButton: false,
                            background: dataSuccess.background,
                            color: dataSuccess.color,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        })
                    }
                }
                
            })

        }
    })
}




