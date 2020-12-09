window.onload = () => {
    fetch("servicio_coordenadas.php", { method: 'POST', body: JSON.stringify({ "servicio": "rangoFilas" }) })
        .then(response => response.text())
        .then(result => {
            console.log(result)
            let a = parseInt(Math.random() * (result.length));
            let fila = result[a];
            document.getElementById('coordenadas').innerHTML = fila;
            fetch("servicio_coordenadas.php", { method: 'POST', body: JSON.stringify({ "servicio": "rangoColumnas" }) })
                .then(response => response.text())
                .then(result => {
                    console.log(result)
                    let b = parseInt(Math.random() * (result.length))
                    let columna = result[b];
                    document.getElementById('coordenadas').innerHTML += columna;


                    document.getElementById('btValidar').onclick = () => {
                        fetch("servicio_coordenadas.php", { method: 'POST', body: JSON.stringify({ "servicio": "elemento", "fila": fila, "columna": columna }) })
                            .then(response => response.text())
                            .then(result => {
                                console.log(result)

                                document.querySelector('.resultado').innerHTML = (document.getElementById('valor').value == result) ? "Has acertado" : "Has fallado";

                            })
                    };

                })
        })

}