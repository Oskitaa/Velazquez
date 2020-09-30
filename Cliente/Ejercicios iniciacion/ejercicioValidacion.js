


function soloLetras(e) {
    var letras = /[a-zA-ZñÑá-úÁ-Ú ]/;
    return letras.test(e.key);
}

function validarTodo() {

    var name = document.getElementById("nombre").value;
    var info_name = document.getElementById('info_nombre');
    (name.trim().length < 2) ? info_name.innerHTML = 'Demasiado corto' : info_name.innerHTML = '';

    var sex = document.getElementById('sexo').value;
    var info_sexo = document.getElementById('info_sexo');
    (sex == "") ? info_sexo.innerHTML = 'Seleccione una opción' : info_sexo.innerHTML = '';

    var dni = document.getElementById('dni').value;
    var info_dni = document.getElementById('info_dni');
    (!validaDni(dni.toUpperCase())) ? info_dni.innerHTML = 'DNI incorrecto' : info_dni.innerHTML = '';

    var sug = document.getElementById('sugerencia').value;
    var info_sugerencia = document.getElementById('info_sugerencia');
    (sug.trim() == '') ? info_sugerencia.innerHTML = 'Obligatorio poner una sugerencia' : info_sugerencia.innerHTML = '';

    return (info_name.innerHTML == '' && info_sexo.innerHTML == '' && info_dni.innerHTML == '' && info_sugerencia.innerHTML == '') ? true : false;
}

function validaDni(dni) {

    var numero, letr
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var patternDni = /^\d{8}[A-Z]$/;

    if (patternDni.test(dni)) {
        numero = dni.substr(0, dni.length - 1) % 23;
        letr = dni.substr(dni.length - 1, 1);
        console.log(letras.charAt(numero))
        return letr == letras.charAt(numero);
    }

    return false;
}