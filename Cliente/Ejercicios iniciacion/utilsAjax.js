
const peticionAJAX = (metodo, url, callback) => {
  const peticion = new XMLHttpRequest();

  peticion.open(metodo, url);
  peticion.send();

  document.querySelector("#gif").style.visibility = "visible";

  peticion.onreadystatechange = () => {
    if (peticion.readyState == 4 && peticion.status == 200) {
      document.querySelector("#gif").style.visibility = "hidden";
      callback(JSON.parse(peticion.responseText));
    }
  }
};