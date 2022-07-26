export function alertMessage(message, type){
    Swal.fire({
        toast: true,
        icon: type == 'success' ? 'success' : 'error',
        title: message,
        position: 'top',
        timer: 2000,
        showConfirmButton: false,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        background: type == 'success' ? '#21ba45' : '#fff',
        color: type == 'success' ? '#fff' : '#000',
    });
}








