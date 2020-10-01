export function soloLetras(e) {
         var condicion = (((e.keyCode >= 97) && (e.keyCode <= 122)) || ((e.keyCode >= 65) && (e.keyCode <= 90)));
        return condicion = condicion || (" ñÑáÁéÉíÍóÓúÚ".indexOf(e.key) != -1);;
}

export function validaDni(dni){
        var numero, letr
        var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';

        if (dni.length == 9) {
            numero = dni.substr(0, dni.length - 1) % 23;
            letr = dni.substr(dni.length - 1, 1);
            return letr.toUpperCase() == letras.charAt(numero);
        }

        return false;
}       

export function contarLetras(letras, min){
      return  (letras.trim().length < min ) ? true  : false;
}

export function soloNum(e) {
        console.log('entra')
       return (e.keyCode >= 48) && (e.keyCode <= 57);
}

