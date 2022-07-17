const time = 3000
const position = 'top'
const dataSuccess = {
    icon: 'success',
    message: $('#wrapper').attr('data-messageSuccess'),
    color: '#fff',
    background: '#21ba45',
}
const dataError = {
    icon: 'error',
    message: $('#wrapper').attr('data-messageError'),
    color: '#000',
    background: '#fff',
}
$(function() {
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

    $(document).on('click', '.btn-delete', actionDelete)

})

function actionDelete (){
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
                success: function (data) {
                    that.parent().parent().fadeOut()
                    Swal.fire({
                        toast: true,
                        icon: dataSuccess.icon,
                        title: "Xóa thành công",
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
                },
                error: function (res) {
                    if(res.status == 403) {
                        Swal.fire({
                            toast: true,
                            icon: dataError.icon,
                            title: "Bạn không có quyền truy cập",
                            position: position,
                            timer: time,
                            showConfirmButton: false,
                            background: dataError.background,
                            color: dataError.color,
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


