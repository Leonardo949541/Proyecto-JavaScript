const datos = {
    nombre: '',
    apellidoM: '',
    apellidoP: '',
    edad: ''
}

const nombre = document.querySelector('#nombre');
const apellidoM = document.querySelector('#apellidoM');
const apellidoP = document.querySelector('#apellidoP');
const edad = document.querySelector('#edad');
const formulario = document.querySelector('#formulario');

nombre.addEventListener('input', leerTexto);
apellidoM.addEventListener('input', leerTexto);
apellidoP.addEventListener('input', leerTexto);
edad.addEventListener('input', leerTexto);

formulario.addEventListener('submit', function(evento) {
    evento.preventDefault();

    const { nombre, apellidoM, apellidoP, edad } = datos;

    if(nombre === "" || apellidoM === "" || apellidoP === "" || edad === "" || esNumero(edad) == false || esPalabra(nombre) == false
      || esPalabra(apellidoM) == false || esPalabra(apellidoP) == false){
        mostrarAlerta('Falta llenar algun campo o escribio un caracter invalido', 'error');
        return;
    }else{
        location.href = "../ventaBoletos/inicioDeSesion.php"+"?nombre="+nombre+"&apellidoM="+apellidoM+"&apellidoP="+apellidoP+"&edad="+edad;
    }
});

function leerTexto(e) { 
    datos[e.target.id] = e.target.value;
    console.log(datos);
}

function mostrarAlerta(mensaje, error = null){
    const alerta = document.createElement('P');
    alerta.textContent = mensaje;

    if(error) {
        alerta.classList.add('error');
    }else{
    }

    formulario.appendChild(alerta);

    // Desaparece el error después de 5 segundos
    setTimeout(() => {
        alerta.remove();
    }, 5000);
}

function esNumero(numero){
    if(!/^([0-99])*$/.test(numero)){
        return false; // No es un numero
    }else{
        return true;
    }
}

function esPalabra(palabra){
        var regex = new RegExp("^[a-zA-Z ]+$");
        if (!regex.test(palabra)) {
          return false;
        }else{
            return true;
        }
      ;
}
/*function mostrarError(mensaje){
    const error = document.createElement('P');
    error.textContent = mensaje;
    error.classList.add('error');

    formulario.appendChild(error);

    // Desaparece el error después de 5 segundos
    setTimeout(() => {
        error.remove();
    }, 5000);
}*/