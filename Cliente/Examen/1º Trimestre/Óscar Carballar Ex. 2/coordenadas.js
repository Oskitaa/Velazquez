let p = {
    'servicio' : 'rangoFilas'
}
let config = {
    mehtod : 'GET',
    head : JSON.stringify(p)
}

fetch('servicio_coordenadas.php',config)
.then(data  => data.json())
.then(res => console.log(res))