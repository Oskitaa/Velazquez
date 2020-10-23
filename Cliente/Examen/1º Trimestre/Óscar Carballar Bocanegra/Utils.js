function soloLetras(e) {
       var condicion = (((e.keyCode >= 97) && (e.keyCode <= 122)) || ((e.keyCode >= 65) && (e.keyCode <= 90)));
       return condicion = condicion || (" ñÑáÁéÉíÍóÓúÚ".indexOf(e.key) != -1);
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

function contarLetras(letras, min) {
       return (letras.trim().length < min) ? true : false;
}

function contarLetrasExac(letras, num) {
       return (letras.trim().length == num) ? true : false;
}

function soloNum(e) {
       return (e.keyCode >= 48) && (e.keyCode <= 57);
}

function soloNumSigno(e) {
       if (e.key == '-' && this.value.indexOf('-') == -1) {
              this.value = '-' + this.value;
       }
       console.log(this.value);
       return (e.keyCode >= 48) && (e.keyCode <= 57) || ('-'.indexOf(e.key) != -1) && this.value.indexOf('-') == -1;
}

function soloNumDec1(e) {
       return (e.keyCode >= 48) && (e.keyCode <= 57) || (','.indexOf(e.key) != -1) && this.value.indexOf(',') == -1;
}

function soloNumDec2(e) {
       return (e.keyCode >= 48) && (e.keyCode <= 57) || ('.'.indexOf(e.key) != -1) && this.value.indexOf('') == -1;
}