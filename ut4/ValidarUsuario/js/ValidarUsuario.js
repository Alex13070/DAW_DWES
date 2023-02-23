const campoUsuario = document.getElementById("nombre");
const form = document.getElementById('formUsuario');
const resultado = document.getElementById('resultado');

form.addEventListener('submit', (e) => {
    e.preventDefault()

    fetch('http://127.0.0.1:8000/ut4/ValidarUsuario/src/controllers/ValidarUsuario.php', 
    {
        method: 'POST',
        body: new FormData(form),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        resultado.classList = data.exito ? 'exito' : 'fracaso';
        resultado.innerHTML = data.mensaje;
    })
    .catch(error => {
        console.error(error);
        resultado.innerHTML = "Ha habido un problema al conectar con el servidor."
    })


})
