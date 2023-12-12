
document.addEventListener("DOMContentLoaded", function() {
    var item = document.querySelector(".item");
    var submitForm = document.querySelector(".submit-form");

    // Verifica si el formulario es más alto que la ventana
    if (submitForm.clientHeight > window.innerHeight) {
        // Ajusta la altura máxima del contenedor del formulario
        item.style.maxHeight = submitForm.clientHeight + "px";
    }
    else {
        formContainer.style.overflowY = 'hidden';
    }
});