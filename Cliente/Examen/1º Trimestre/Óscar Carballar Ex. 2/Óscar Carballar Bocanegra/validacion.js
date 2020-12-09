window.onload = () => {
    document.querySelector('#nombre').onkeypress = soloLetras;
    document.querySelector('#apellidos').onkeypress = soloLetras;
    document.querySelector('#nombre').onblur = function() {
        (escritoAlgo(this.value)) ? document.querySelector('#spnombre').innerHTML = '' : document.querySelector('#spnombre').innerHTML = 'Error, escribe algo.';
    };
    document.querySelector('#apellidos').onblur = function() {
        (escritoAlgo(this.value)) ? document.querySelector('#spapellidos').innerHTML = '' : document.querySelector('#spapellidos').innerHTML = 'Error, escribe algo.';
    };
    document.querySelector('#nif').onkeypress = numLetrasDni;
    document.querySelector('#nif').onblur = function () {
        (validaDni(this.value)) ? document.querySelector('#spnif').innerHTML = '' : document.querySelector('#spnif').innerHTML = 'Error con el DNI.';
    }
    document.querySelector('#usuario').onkeypress = nunmLetas;
    document.querySelector('#usuario').onblur = alMenosUna;
    document.querySelector('#clave').onblur = validaClave;
    document.querySelector('#rep_clave').onblur = validaClave;
    document.querySelector('#rep_clave').onblur = function(){
        (validaIgual(this.value)) ? document.querySelector('#sprep_clave').innerHTML = '' : document.querySelector('#sprep_clave').innerHTML = 'Las contraseñas no coinciden.';
    };

    document.querySelector('#fn_dia').onkeypress = soloNum;
    document.querySelector('#fn_mes').onkeypress = soloNum;
    document.querySelector('#fn_ano').onkeypress = soloNum;

    document.querySelector('#enviar').onclick = function(e){
    
    document.querySelectorAll('input').forEach(e => e.focus());
    (validaFecha()) ? document.querySelector('#spf_nacimiento').innerHTML='' : document.querySelector('#spf_nacimiento').innerHTML ='Error';
    
     return   (document.querySelector('#spnif').innerHTML == '' && document.querySelector('#spusuario').innerHTML == '' && document.querySelector('#spclave').innerHTML == '' && document.querySelector('#sprep_clave').innerHTML == '' && document.querySelector('#spf_nacimiento').innerHTML == '') ? true : false;

    }

}

function escritoAlgo(valor) {
    return (valor.length > 0) ? true : false;
}

function soloLetras(e) {
    var condicion = (((e.keyCode >= 97) && (e.keyCode <= 122)) || ((e.keyCode >= 65) && (e.keyCode <= 90)));
    return condicion = condicion || (" ñÑáÁéÉíÍóÓúÚ".indexOf(e.key) != -1);;
}

function numLetrasDni(e) {
    return (this.value.length < 9) ? (this.value.length < 8) ? soloNum(e) : soloLetras(e) : false;
}

function nunmLetas(e) {
    document.querySelector('#spusuario').innerHTML = '';
    if(this.value.length < 4){
        document.querySelector('#spusuario').innerHTML = 'Minimo 5 letras';
    }
    if (this.value.length < 20) {
        return soloNum(e) || soloLetras(e);    
    }
    return false;
}

function alMenosUna() {
    document.querySelector('#spusuario').innerHTML ='';
    let condicion1 = false, condicion2 = false;
    for (let i = 0; i < this.value.length; i++) {
        if (('ABCDEFGHIJKLMNÑOPQRSTUVWXYZ').indexOf(this.value.charAt(i).toUpperCase()) != -1) {
            condicion1 = true;
        }
        if (('0123456789').indexOf(this.value.charAt(i)) != -1) {
            condicion2 = true;
        }
    }
    if (!condicion1) {
        document.querySelector('#spusuario').innerHTML += 'Al menos una letra.';
    }
    
    if (!condicion2) {
        document.querySelector('#spusuario').innerHTML += 'Al menos un numero.';
    }
    return condicion1 && condicion2;
}

function validaClave() {
    document.querySelector('#spclave').innerHTML = '';
    if (this.value.length > 7) {
        let condicion1 = false, condicion2 = false, condicion3 = false,condicion4=false;
        for (let i = 0; i < this.value.length; i++) {
            if (('ABCDEFGHIJKLMNÑOPQRSTUVWXYZ').indexOf(this.value.charAt(i)) != -1) {
                condicion1 = true;
            }
            if (('0123456789').indexOf(this.value.charAt(i)) != -1) {
                condicion2 = true;
            }
            if (('_@&$%?#').indexOf(this.value.charAt(i)) != -1) {
                condicion3 = true;
            }
            
            if (('abcdefghijklmnñopqrstuvwxyz').indexOf(this.value.charAt(i)) != -1) {
                condicion4 = true;
            }
        }
        if (!condicion1) {
            document.querySelector('#spclave').innerHTML += 'Al menos una letra mayuscula.';
        }
        
        if (!condicion2) {
            document.querySelector('#spclave').innerHTML += 'Al menos un numero.';
        }    
        
        if (!condicion3) {
            document.querySelector('#spclave').innerHTML += 'Al menos un caracter.';
        }

        if (!condicion4) {
            document.querySelector('#spclave').innerHTML += 'Al menos una letra minuscula.';
        }
        return condicion1 && condicion2 && condicion3 && condicion4;
    }
    else {
        document.querySelector('#spclave').innerHTML += 'Minimo 8 caracteres.';
        return false;
    }
}

function validaDni(dni) {
    var numero, letr
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
    if (dni.length == 9) {
        numero = dni.substr(0, dni.length - 1) % 23;
        letr = dni.substr(dni.length - 1, 1);
        return letr.toUpperCase() == letras.charAt(numero);
    }
    return false;
}

function soloNum(e) {
    return (e.keyCode >= 48) && (e.keyCode <= 57);
}

function validaIgual(clave){
    return (clave == document.querySelector('#clave').value) ? true : false;
}

function validaFecha(){
    let dia=document.querySelector('#fn_dia').value;
    let mes=document.querySelector('#fn_mes').value;
    let ano=document.querySelector('#fn_ano').value;

    let fecha= new Date(`${mes},${dia},${ano}`);

    let edad = (new Date(Date.now()- fecha).getFullYear())-1970;

    return (edad >= 18) ? true : false;
}