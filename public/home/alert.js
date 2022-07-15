$(function () {

    var messageSuccess = $('#container').attr('data-messageSuccess')
    var messageError = $('#container').attr('data-messageError')
    const time = 1500

    if (messageSuccess != '' || messageError != '') {
        Swal.fire({
            icon: messageSuccess != '' ? "success" : "error",
            title: messageSuccess != '' ? messageSuccess : messageError,
            position: "center",
            timer: time,
            showConfirmButton: false,
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
                        Swal.fire(
                            'Thành công!',
                            'Xóa thành công',
                            'success'
                        )
                    }
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
                success: function (data) {
                    if (data.status = 200) {
                        that.closest('.comments-grid').fadeOut()
                        Swal.fire(
                            'Thành công!',
                            'Xóa thành công',
                            'success'
                        )
                    }
                }
            })

        }
    })
}




