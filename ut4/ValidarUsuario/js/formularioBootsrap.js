document.querySelectorAll("form").forEach((form) => {
    form.addEventListener('submit', (event) => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});


// Validar los checkbox
const checkboxes = document.getElementById("formulario").querySelectorAll('input[type=checkbox]');

function atLeastOneCheckboxIsChecked() {
    const checkboxes = Array.from(document.querySelectorAll(".checkbox"));
    return checkboxes.reduce((acc, curr) => acc || curr.checked, false);
}

function init() {
    
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', checkValidity);
        checkValidity();
    }
}

function isChecked() {
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) return true;
    }

    return false;
}

function checkValidity() {
    const errorMessage = !isChecked() ? 'Tiene que haber al menos un checkbox seleccionado.' : '';
    checkboxes.forEach((chk) => {
        chk.setCustomValidity(errorMessage)
    });
}

init();

const clave = document.getElementById("password");

clave.onmouseover = () => {
    clave.type = "text";
}

clave.onmouseleave = () => {
    clave.type = "password";
}