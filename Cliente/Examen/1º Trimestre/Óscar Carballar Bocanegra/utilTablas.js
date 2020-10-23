
var aTabla = [0, 1, 2, 3];
aTabla[0] = [00, 01, 02, 03];
aTabla[1] = [10, 11, 12, 13];
aTabla[2] = [20, 21, 22, 23];
aTabla[3] = [30, 31, 32, 33];


window.onload = () => {
    let tabla = document.getElementsByTagName('table')[0];
    genTabla(aTabla);
    aDeTabla(tabla);

}



function genTabla(aTabla) {
    let table = document.createElement('table');
    aTabla.forEach(columna => {
        var tr = document.createElement('tr');
        columna.forEach(fila => {
            let td = document.createElement('td');
            td.innerText = fila;
            tr.appendChild(td);
        })
        table.appendChild(tr);
    });
    return document.body.appendChild(table);
}

function aDeTabla(tabla) {
    let array = [];
    console.log(tabla);

    //Por si tiene Thead 
    if (tabla.children[0] != undefined) {
        for (var i = 0; i < tabla.children[0].children.length; i++) {
            array[i] = new Array;
            for (var j = 0; j < tabla.children[0].children[i].children.length; j++) {
                array[i][j] = tabla.children[0].children[i].children[j].innerText;
            }
        }
    }
    console.log(tabla.children);

    //Por si solo tiene tbody, si no tuviera se crea por defecto
    for (var i = 0; i < tabla.children[1].children.length; i++) {
        array[i] = new Array;
        for (var j = 0; j < tabla.children[1].children[i].children.length; j++) {
            array[i][j] = tabla.children[1].children[i].children[j].innerText;
        }
    }

    console.table(array);

    return array;



}