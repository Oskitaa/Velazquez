window.onload = () => {
    llenaSelect(document.querySelector('#factura'));
    document.querySelector('#factura').onchange = function () {
        llenaFra(this.value, document.querySelector('#filas_tabla'));
    }
    document.querySelector('#btAnade').onclick = anadeDetalle;
    document.querySelector('#btCancelar').onclick = btCancel;
}

const llenaSelect = (select) => {
    let opc = {
        method: 'POST',
        body: JSON.stringify({ "servicio": "facturas" })

    };
    fetch("servidor.php", opc)
        .then(response => response.json())
        .then(result => {
            result.forEach(element => {
                select.add(new Option(`Factura: ${element['NUMERO']}. Fecha: ${element['FECHA']}`, element['ID']))
            })
        })
        .catch(error => console.log('error', error));
}

const llenaFra = (value, row) => {
    let opc = {
        method: 'POST',
        body: JSON.stringify({
            "servicio": "detalle",
            "idFactura": value
        })
    };
    var ivasum = 0;
    var fraasum = 0;
    fetch("servidor.php", opc)
        .then(response => response.json())
        .then(result => {
            let tabla = document.querySelector('#detalle');
            row.innerHTML = "";
            result.forEach(element => {
                let tr = document.createElement('tr');
                for (let i in element) {
                    if (i != "ID_FACTURA") {
                        let th = document.createElement('th');
                        th.innerHTML = element[i];
                        tr.appendChild(th);
                    }
                }
                let th = document.createElement('th');
                let totalIva = (parseFloat((element['CANTIDAD'] * element['TIPO_IVA'] / 100) * element['PRECIO']));
                th.innerHTML = totalIva.toFixed(2);
                tr.appendChild(th);

                let totalFra = totalIva + parseFloat((element['CANTIDAD'] * element['PRECIO']));
                th = document.createElement('th');
                th.innerHTML = totalFra.toFixed(2);
                ivasum += totalIva;
                fraasum += totalFra;
                tr.appendChild(th);

                th = document.createElement('th');
                let btn = document.createElement('button');
                btn.dataset.id = element["ID"];
                btn.innerHTML = "editar";
                btn.onclick = modDetalle;
                th.appendChild(btn);
                tr.appendChild(th);

                th = document.createElement('th');
                btn = document.createElement('button');
                btn.dataset.id = element["ID"];
                btn.innerHTML = "borrar";
                btn.onclick = borrarDetalle;
                th.appendChild(btn);
                tr.appendChild(th);

                row.appendChild(tr);
                tabla.appendChild(row);

            })

            document.querySelector('#Tiva').innerHTML = ivasum.toFixed(2);
            document.querySelector('#Ttotal').innerHTML = fraasum.toFixed(2);

        })
        .catch(error => console.log('error', error));


}

const anadeDetalle = () => {
    let cantidad = document.querySelector('#cantidad').value;
    let concepto = document.querySelector('#concepto').value;
    let precio = document.querySelector('#precio').value;
    let tipo_iva = document.querySelector('#tipo_iva').value;
    let numFra = document.querySelector('#factura').value;

    let obj = JSON.stringify({
        "servicio": "anade",
        "idFactura": numFra,
        "cantidad": cantidad,
        "concepto": concepto,
        "precio": precio,
        "tipo_iva": tipo_iva
    });

    var opc = {
        method: 'POST',
        body: obj,
    };

    fetch("servidor.php", opc)
    .then(()=>llenaFra(numFra, document.querySelector('#filas_tabla')));
}

function borrarDetalle() {
    let numFra = document.querySelector('#factura').value;
    let obj = JSON.stringify({
        "servicio": "borra",
        "id": this.dataset.id
    });

    var opc = {
        method: 'POST',
        body: obj,
    };

    if (confirm("Desea borrar este detalle?")) {
        fetch("servidor.php", opc)
        .then(()=>llenaFra(numFra, document.querySelector('#filas_tabla')));
    }
    
}

function modDetalle() {
    var opc = {
      method: 'POST',
      body: JSON.stringify({"servicio":"selDetalleID","id":this.dataset.id})
    };
    document.querySelector('#league').innerHTML = "Modificar detalle";
    document.querySelector('#btAnade').innerHTML = "Modificar linea de detalle";
    let cantidad = document.querySelector('#cantidad');
    let concepto = document.querySelector('#concepto');
    let precio = document.querySelector('#precio');
    let tipo_iva = document.querySelector('#tipo_iva');
    fetch("servidor.php", opc)
      .then(response => response.json())
      .then(result => {
        cantidad.value = result['CANTIDAD'];
        concepto.value = result['CONCEPTO'];
        precio.value = result['PRECIO'];
        tipo_iva.value = result['TIPO_IVA'];
      })
      .catch(error => console.log('error', error));

      document.querySelector('#btAnade').onclick= ()=>{
        
        let numFra = document.querySelector('#factura').value;
        let obj={
            "servicio": "modificarDetalle",
            "id": this.dataset.id,
            "cantidad": cantidad.value,
            "concepto": concepto.value,
            "precio": precio.value,
            "tipo_iva": tipo_iva.value
        }
        let opc = {
            method: 'POST',
            body: JSON.stringify(obj)
          };
        fetch("servidor.php",opc)
        .then(()=>llenaFra(numFra, document.querySelector('#filas_tabla')));;
        btCancel();
      }
}

function btCancel(){
    document.querySelector('#league').innerHTML = "Añadir detalle";
    document.querySelector('#btAnade').innerHTML = "Añadir línea de detalle";
    document.querySelector('#btAnade').onclick = anadeDetalle;
    document.querySelector('#cantidad').value = 5;
    document.querySelector('#concepto').value = "Nuevo detalle";
    document.querySelector('#precio').value = "25";
    document.querySelector('#tipo_iva').value = "21";
}

