$(function () {
    $('.select2_init').select2({
        'placeholder': 'Chọn vai trò (mặc định: user)',
    })
    $('.select3_init').select2({
        'placeholder': 'Chọn danh mục',
    })
    $('#dob').datepicker({
        language: 'vi',
        orientation: 'bottom',
        dateFormat: 'yyyy-mm-dd'
    });
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

