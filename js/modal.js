window.onload = function () {

    if(document.querySelector('#modal') == null) return;

    // Mostrar modal, en caso de que exista
    let modal = new bootstrap.Modal(document.querySelector('#modal'));
    modal.show();
    
}