document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

function validarFormulario(evento) {

    evento.preventDefault();
    let formulario = document.getElementById('formulario');

    let valido = true;

    for (let index = 0; index < formulario.length && valido; index++) {
        if (formulario.elements[index].value.length < 1) {
            valido = false;
        }
        
    }
    
    if (valido) {
        this.submit();
    }
    else {
        mostrarMensajeError();
    }
    
}

function mostrarMensajeError() {
    var x = document.getElementById("mensaje_error");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
}