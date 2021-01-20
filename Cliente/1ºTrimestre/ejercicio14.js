window.onload = () => {
    var enlace = document.getElementsByTagName('a');
    for(i in enlace){
        enlace[i].onclick = ocultarParrafo;
    }
}

function ocultarParrafo () {
 
    var parrafo = document.getElementById('contenidos_' + this.getAttribute('id').split('_')[1])
    
    parrafo.style.display === 'none' ?  parrafo.setAttribute('style','display:block') : parrafo.setAttribute('style','display:none'); 
    this.innerHTML = this.innerHTML === 'Ocultar contenidos' ? 'Mostrar contenidos' : 'Ocultar contenidos';
   


}