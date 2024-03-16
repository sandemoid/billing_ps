// sweet alert
document.addEventListener('DOMContentLoaded', function () {
    if (typeof failed !== 'undefined') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: failed,
        });
    } else if (typeof success !== 'undefined') {
        Swal.fire({
            icon: 'success',
            title: 'Good job!',
            text: success,
            confirmButtonColor: '#0d6efd',
        });
    }
});