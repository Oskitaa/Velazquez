function ValidarNIF_V2(dni) {
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
    if (dni.length == 9 || dni.length == 10) {
        if (dni.length == 10) {
            let dni2 = (dni.split('-'))
            let numero = dni2[0] % 23;
            let dnivalido = `${dni2[0]}${letras.charAt(numero)}`;
            return {
                'letra': dni2[1],
                'valido': dni2[1].toUpperCase() == letras.charAt(numero),
                'Nif': dnivalido
            };
        }
        else {
            let numero = dni.substr(0, dni.length - 1) % 23;
            let letr = dni.substr(dni.length - 1, 1);
            let dnivalido = `${dni.substr(0, dni.length - 1)}${letras.charAt(numero)}`;
            return {
                'letra': letr,
                'valido': letr.toUpperCase() == letras.charAt(numero),
                'Nif': dnivalido
            };

        }
    }
}