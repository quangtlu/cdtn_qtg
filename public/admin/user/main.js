$(function () {
    $('.select2_init').select2({
        'placeholder': 'Chọn vai trò (mặc định: user)',
    })
    $('.select3_init').select2({
        'placeholder': 'Chọn mục lục',
    })
    
    
    $('#role-select').on('change', function() {
        let roleSelected = $(this).select2('data')
        let categoryWrap = $('#category-wrap')
        if (roleSelected.length == 0) {
            categoryWrap.fadeOut()
        }
        roleSelected.forEach(role => {
            if(role.text == 'counselor') {
                categoryWrap.fadeIn()
                $('.select3_init').attr('name', 'category_id[]')
            }
            else {
                categoryWrap.fadeOut()
                $('.select3_init').attr('name', '')
            }
        });
    })
})

