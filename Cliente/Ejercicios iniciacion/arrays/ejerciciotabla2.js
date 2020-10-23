import { soloNum } from '../Utils.js';

window.onload = () => {
    document.getElementById('ncolumnas').onkeypress = soloNum;
    document.getElementById('nfilas').onkeypress = soloNum;
    document.getElementById('btGenTabla').onclick = generaTabla;
}

function generaTabla() {
    let div = document.getElementById('tabla');
    let filas = document.getElementById('nfilas').value;
    let columnas = document.getElementById('ncolumnas').value;
    let tabla = document.createElement('table');
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');

    div.innerHTML = '';

    for (var i = 1; i <= columnas; i++) {
        let td_col1 = document.createElement('td');
        td_col1.innerHTML = `Columna ${i}`
        thead.appendChild(td_col1);
        tabla.appendChild(thead);
    }

    for (var i = 1; i <= filas; i++) {
        let tr_fil = document.createElement('tr');
        tbody.appendChild(tr_fil);
        for (var j = 1; j <= columnas; j++) {
            let td_fil = document.createElement('td');
            td_fil.innerHTML = `F ${i} C ${j}`
            tr_fil.appendChild(td_fil);
        }
    }

    tabla.appendChild(tbody);
    div.appendChild(tabla);
}