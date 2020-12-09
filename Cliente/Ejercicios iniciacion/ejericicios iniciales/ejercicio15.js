window.onload = () => {
	document.onkeypress  = capturarTeclado;
	document.onmousemove = capturarRaton;
	document.onclick = ()=> {document.getElementById('info').style.backgroundColor = '#FFFFCC'};
}

function capturarRaton(eve){
	muestraInformacion(['Ratón',`Navegador [${eve.screenX}, ${eve.screenY}]`,`Pagina [${eve.clientX}, ${eve.clientY}]`])
	document.getElementById('info').style.backgroundColor = '#FFFFFF';
}

function capturarTeclado(eve){
	muestraInformacion(['Teclado',`Carácter [${String.fromCharCode(eve.keyCode)}]`,`Código [${eve.keyCode}]`])
	document.getElementById('info').style.backgroundColor = '#CCE6FF';
}

function muestraInformacion(mensaje) {
	document.getElementById("info").innerHTML = '<h1>'+mensaje[0]+'</h1>';
	for(var i=1; i<mensaje.length; i++) {
		document.getElementById("info").innerHTML += '<p>'+mensaje[i]+'</p>';
	}
}


var div = document.getElementById('info');

div.addEventListener('mousedown', down,false);
window.addEventListener('mouseup', up, false)


function down(){
	window.addEventListener('mousemove', move);
}

function up(){
	window.removeEventListener('mousemove', move);
}

function move(e){
	console.log('entra')
	div.style.top = e.clientY + 'px';
	div.style.left = e.clientX + 'px';

}