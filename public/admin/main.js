import { alertMessage } from '../js/alert.js';

function actionDelete() {
    let urlRequest = $(this).data('url');
    let that = $(this)
    Swal.fire({
        title: 'Bạn có chắc muốn xóa ?',
        text: "Bạn không thể khôi phục bản ghi này",
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
                    that.parent().parent().fadeOut()
                    alertMessage(res.message, 'success')
                },
                error: function(errors) {
                    let message = errors.responseJSON.message
                    alertMessage(message, 'error')
                }
            })
        }
    })
}

$(function () {
    const messageSuccess = $('#wrapper').attr('data-messageSuccess')
    const messageError = $('#wrapper').attr('data-messageError')
    if(messageSuccess) {
        alertMessage(messageSuccess, 'success')
    }
    if(messageError) {
        alertMessage(messageError, 'error')
    }
    $(document).on('click', '.btn-delete', actionDelete)

})



