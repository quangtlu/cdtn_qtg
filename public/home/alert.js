$(function() {
    $(document).on('click', '.btn-delete', actionDelete)

    var messageSuccess = $('#container').attr('data-messageSuccess')
    var messageError = $('#container').attr('data-messageError')

    if(messageSuccess != '') {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: messageSuccess,
            showConfirmButton: false,
            timer: 1500
        })
    }
    if(messageError != '') {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: messageError,
            showConfirmButton: false,
            timer: 1500
        })
    }
        
})

function actionDelete (){
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
                    if(data.status = 200) {
                        that.closest('.wthree-top-1').fadeOut()
                        Swal.fire(
                            'Thành công!',
                            'Bản ghi đã được xóa',
                            'success'
                        )
                    }
                }
            })

        }
      })
}


