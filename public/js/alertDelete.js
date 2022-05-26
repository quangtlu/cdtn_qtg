$(function() {
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


