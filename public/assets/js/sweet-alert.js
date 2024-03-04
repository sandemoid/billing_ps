// sweet alert
document.addEventListener('DOMContentLoaded', function () {
    if (typeof failed !== 'undefined') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: failed,
        });
    } else if (typeof success !== 'undefined') {
        Swal.fire('Good job!', success, 'success');
    }
});