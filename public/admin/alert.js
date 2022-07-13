$(function() {

    var messageSuccess = $('#wrapper').attr('data-messageSuccess')
    var messageError = $('#wrapper').attr('data-messageError')
    const time = 3000

    if (messageSuccess != '' || messageError != '') {
        Swal.fire({
            toast: true,
            icon: messageSuccess != '' ? "success" : "error",
            title: messageSuccess != '' ? messageSuccess : messageError,
            position: "top-end",
            timer: time,
            showConfirmButton: false,
            showClass: {
                popup: 'animate__animated animate__fadeInRight'
              },
            hideClass: {
            popup: 'animate__animated animate__fadeOutRight'
            }
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
                    if(data.status = 200) {
                        that.parent().parent().fadeOut()
                        Swal.fire({
                            toast: true,
                            icon: "success",
                            title: 'Xóa thành công',
                            position: "top-end",
                            timer: 2000,
                            showConfirmButton: false,
                            showClass: {
                                popup: 'animate__animated animate__fadeInRight'
                              },
                            hideClass: {
                            popup: 'animate__animated animate__fadeOutRight'
                            }
                        });
                    }
                }
            })

        }
      })
}


