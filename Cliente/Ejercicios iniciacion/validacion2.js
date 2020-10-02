import {soloLetras, validaDni, contarLetras, soloNum} from './Utils.js';

document.getElementById('formulario_1').onsubmit = validarTodo;

document.getElementById('nombre').onkeypress = soloLetras;

var fechas = document.getElementsByName('date');

for(var i = 0; i < fechas.length; i++){
    fechas[i].onkeypress = soloNum;
}

function validarTodo() {

    let name = document.getElementById("nombre").value;
    let info_name = document.getElementById('info_nombre');
    (contarLetras(name, 2)) ? info_name.innerHTML = 'Nombre demasiado corto' : info_name.innerHTML = '';

    let surname = document.getElementById("apellidos").value;
    let info_surname = document.getElementById('info_apellidos');
    (contarLetras(surname, 4)) ? info_surname.innerHTML = 'Apellido demasiado corto' : info_surname.innerHTML = '';

    let sex = document.getElementById('sexo').value;
    let info_sexo = document.getElementById('info_sexo');
    (sex == "") ? info_sexo.innerHTML = 'Seleccione una opción' : info_sexo.innerHTML = '';

    let dni = document.getElementById('dni').value;
    let info_dni = document.getElementById('info_dni');
    (!validaDni(dni.toUpperCase())) ? info_dni.innerHTML = 'DNI incorrecto' : info_dni.innerHTML = '';

    let fecha = new Date(`${fechas[1].value}/${fechas[0].value}/${fechas[2].value}`);
    let info_fecha = document.getElementById('info_fecha');

    console.log((new Date(Date.now()- fecha).getFullYear())-1970);

    (!((fecha.getFullYear()==fechas[2].value) && (fecha.getMonth()+1==fechas[1].value) && (fecha.getDate()==fechas[0].value))) ? info_fecha.innerHTML = 'Fecha incorrecta' : info_fecha.innerHTML ='';

    let sug = document.getElementById('sugerencia').value;
    let info_sugerencia = document.getElementById('info_sugerencia');
    (sug.trim() == '') ? info_sugerencia.innerHTML = 'Obligatorio poner una sugerencia' : info_sugerencia.innerHTML = '';

    return (info_name.innerHTML == '' && info_sexo.innerHTML == '' && info_dni.innerHTML == '' && info_sugerencia.innerHTML == '' && info_surname.innerHTML == '' && info_fecha.innerHTML == '') ? true : false;
}
