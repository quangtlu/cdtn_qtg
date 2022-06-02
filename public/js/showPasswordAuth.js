$(function() {
    var inputPassword = $('#input-password')
    $('#show-pass-icon').on('click', function() {
        if (inputPassword.attr('type') == 'password')
            inputPassword.attr('type', 'text')
        else
            inputPassword.attr('type', 'password')
    })
})