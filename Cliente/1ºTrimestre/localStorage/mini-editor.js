window.onload = () => {
    var nombre = document.getElementById('nombre');
    var texto = document.getElementById('texto');
    document.getElementById('guardar').onclick = () => {
        localStorage.setItem(nombre.value, texto.innerHTML);
    }
    document.getElementById('negrita').addEventListener('mousedown', (e) => {
        ponerTexto(e, "bold");
    });
    document.getElementById('cursiva').addEventListener('mousedown', (e) => {
        ponerTexto(e, "italic");
    });
    document.getElementById('subrayado').addEventListener('mousedown', (e) => {
        ponerTexto(e, "underline");
    });
    document.getElementById('color').addEventListener('mousedown', (e) => {
        ponerTexto(e, 'foreColor', document.getElementById('eligeColor').value)
    });

    addSelect();
}

function ponerTexto(e, tipo, color = null) {
    document.execCommand(tipo, false, color);
    e.preventDefault();
    e.stopPropagation();
}

function addSelect() {
    let select = document.getElementById('select');
    for (var i in localStorage) {
        if (localStorage.getItem(i)) {
            select.add(new Option(i,i));
        }
    }
    select.addEventListener('change', function () {
        texto.innerHTML = localStorage.getItem(this.value);
    })
} 