import { soloLetras, validaDni, contarLetras, soloNum, soloNumDec1, contarLetrasExac} from './Utils.js';

document.getElementById('formulario_1').onsubmit = validarTodo;

document.getElementById('nombre').onkeypress = soloLetras;

document.getElementById('estatura').onkeypress = soloNumDec1;

var fechas = document.getElementsByName('date');

for (var i = 0; i < fechas.length; i++) {
    fechas[i].onkeypress = soloNum;
}

function validarTodo(e) {


    let name = document.getElementById("nombre").value;
    let info_name = document.getElementById('info_nombre');
    (contarLetras(name, 2)) ? info_name.innerHTML = 'Nombre demasiado corto' : info_name.innerHTML = '';

    let surname = document.getElementById("apellidos").value;
    let info_surname = document.getElementById('info_apellidos');
    (contarLetras(surname, 4)) ? info_surname.innerHTML = 'Apellido demasiado corto' : info_surname.innerHTML = '';

    let sex = document.getElementsByName('sexo');
    let info_sexo = document.getElementById('info_sexo');

    function selecSexo() {

        for (var i of sex) {
            if (i.checked) {
                return true;
            }
        }
    }
    (!selecSexo()) ? info_sexo.innerHTML = 'Seleccione una de las 3 opciones' : info_sexo.innerHTML = '';

    let dni = document.getElementById('dni').value;
    let info_dni = document.getElementById('info_dni');
    (!validaDni(dni.toUpperCase())) ? info_dni.innerHTML = 'DNI incorrecto' : info_dni.innerHTML = '';

    let fecha = new Date(`${fechas[1].value}/${fechas[0].value}/${fechas[2].value}`);
    let info_fecha = document.getElementById('info_fecha');

    //console.log((new Date(Date.now()- fecha).getFullYear())-1970);

    (!((fecha.getFullYear() == fechas[2].value) && (fecha.getMonth() + 1 == fechas[1].value) && (fecha.getDate() == fechas[0].value))) ? info_fecha.innerHTML = 'Fecha incorrecta' : info_fecha.innerHTML = '';

    let estatura = document.getElementById('estatura').value;
    let info_estatura = document.getElementById('info_estatura');
    (contarLetras(estatura,1)) ? info_estatura.innerHTML = 'Estatura incorrecta' : info_estatura.innerHTML = '';

    let estado_civil = document.getElementById('estado_civil').value;
    let info_estado_civil = document.getElementById('info_estado_civil');
    (estado_civil == "-1") ? info_estado_civil.innerHTML = 'Seleccione una opción' : info_estado_civil.innerHTML = '';

    let bebidas = document.getElementsByName('bebidas');
    let info_bebidas = document.getElementById('info_bebidas');

    function minBebidas(){
        let numbebidas = 0;

        for(i of bebidas){
            if(i.checked){
                numbebidas++;
            }
        }
        return numbebidas;
    }

    !(minBebidas() >= 3) ? info_bebidas.innerHTML = 'Seleccione un minimo de 3 opciones' : info_bebidas.innerHTML = '';


    let ccc = document.getElementById('ccc').value;
    let info_ccc = document.getElementById('info_ccc');
    (contarLetras(ccc,20)) ? info_ccc.innerHTML = 'Debe ingresar 20 caracreres' : info_ccc.innerHTML = '';


    let sug = document.getElementById('sugerencia').value;
    let info_sugerencia = document.getElementById('info_sugerencia');
    (sug.trim() == '') ? info_sugerencia.innerHTML = 'Obligatorio poner una sugerencia' : info_sugerencia.innerHTML = '';

    return (info_bebidas.innerHTML == '' && info_estado_civil.innerHTML == '' && info_name.innerHTML == '' && info_sexo.innerHTML == '' && info_dni.innerHTML == '' && info_sugerencia.innerHTML == '' && info_ccc.innerHTML == '' && info_bebidas.innerHTML == '' && info_surname.innerHTML == '' && info_fecha.innerHTML == '') ? true : false;
}
