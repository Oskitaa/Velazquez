window.onload = () => {
	document.onkeypress  = capturarTeclado;
	document.onmousemove = capturarRaton;
	document.onclick = ()=> {document.getElementById('info').style.backgroundColor = '#FFFFCC'};
}

function capturarRaton(evento){
	var eve = evento || window.event;
	muestraInformacion(['Ratón',`Navegador [${eve.screenX}, ${eve.screenY}]`,`Pagina [${eve.clientX}, ${eve.clientY}]`])
	document.getElementById('info').style.backgroundColor = '#FFFFFF';
}

function capturarTeclado(evento){
	var eve = evento || window.event;
	muestraInformacion(['Teclado',`Carácter [${String.fromCharCode(eve.keyCode)}]`,`Código [${eve.keyCode}]`])
	document.getElementById('info').style.backgroundColor = '#CCE6FF';
}

function muestraInformacion(mensaje) {
	document.getElementById("info").innerHTML = '<h1>'+mensaje[0]+'</h1>';
	for(var i=1; i<mensaje.length; i++) {
		document.getElementById("info").innerHTML += '<p>'+mensaje[i]+'</p>';
	}
}

var m = document.getElementById('info');
m.addEventListener('mousedown', mouseDown, false);
window.addEventListener('mouseup', mouseUp, false);

function mouseUp() {
    window.removeEventListener('mousemove', move, true);
}

function mouseDown(e) {
    window.addEventListener('mousemove', move, true);
}

function move(e) {
    m.style.top = e.clientY + 'px';
    m.style.left = e.clientX + 'px';
};