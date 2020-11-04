const apiKey = "0cc50cf016347ef65a2ddb7b2d46f602",
  hash = "1f8d32683ccd5cf43efe6633d336a5fe",
  apiHash = `ts=1&apikey=${apiKey}&hash=${hash}`,
  base = "https://gateway.marvel.com/v1/public/characters",
  dimension = "landscape_xlarge.";
var offset = 0;
var limit = 20;
var numComic = 0;

window.onload = function () {

  document.getElementById('search').onkeydown = function (e) {
    if (e.keyCode == 13) searchCharacter(this.value)
  };

  document.getElementById('limit').onchange = function () {
    limit = parseInt(this.value);
    offset = 0;
    showAllCharacter();
  }

  var btnpre = document.getElementById('previous');
  btnpre.onclick = function () {
    offset -= limit;
    showAllCharacter();
  }


  var btnnext = document.getElementById('next');
  btnnext.onclick = function () {
    offset += limit;
    showAllCharacter()
  };
  showAllCharacter();

}


const searchCharacter = (name) => {
  deleteCharacter();
  peticionAJAX('GET', `${base}?name=${name}&${apiHash}`, function (datos) {
    let character = datos.data.results[0];
    createCard(character.thumbnail.path + '/' + dimension + character.thumbnail.extension, character.name, character.description, character.id)
  })
}

const showAllCharacter = () => {
  deleteCharacter();
  peticionAJAX('GET', `${base}?limit=${limit}&offset=${offset}&${apiHash}`, (datos) => {
    datos.data.results.forEach(character => createCard(character.thumbnail.path + '/' + dimension + character.thumbnail.extension, character.name, character.description, character.id));
  })
  document.getElementById('previous').disabled = offset < limit;
  document.getElementById('next').disabled = offset > 1399;

}

const createCard = (img, name, description, idp) => {
  let container = document.createElement('div');
  let top = document.createElement('div');
  let bottom = document.createElement('div');
  let imgp = document.createElement('img');
  let namep = document.createElement('p');
  let descriptionp = document.createElement('p');

  container.id = idp;
  container.classList.add('container');
  top.classList.add('top');
  bottom.classList.add('bottom');

  imgp.src = img;
  namep.innerHTML = name;
  descriptionp.innerHTML = (description == "") ? 'No description available' :  maxCaract(description,190);

  top.appendChild(imgp);
  bottom.appendChild(namep);
  bottom.appendChild(descriptionp);

  container.appendChild(top);
  container.appendChild(bottom);

  document.getElementById('noborrar').appendChild(container);

  container.onclick = function () {
    document.getElementById('moreData').style.top = window.scrollY + "px";
    document.getElementById('moreData').style.display = 'flex'
    showCard(idp)
  };

  document.getElementById('moreData').onclick = function () {
    this.style.display = 'none'
    numComic = 0;
  };
}

const createComic = (titlep, descriptionp, pagep, issuep, imgp, idp) => {
  deleteComic();
  let squareInfo = document.createElement('div');
  let btn1 = document.createElement('button');
  let btn2 = document.createElement('button');
  let cont = document.createElement('div');
  let title = document.createElement('p');
  let description = document.createElement('p');
  let page = document.createElement('p');
  let issue = document.createElement('p');

  squareInfo.style.background = `url(${imgp})`
  btn1.id = idp + '1';
  btn2.id = idp + '2';
  btn1.innerHTML = 'Previous';
  btn2.innerHTML = 'Next';
  btn1.classList = "btns btn_comic";
  btn2.classList = "btns btn_comic";

  btn1.disabled = numComic <= 0;

  btn1.onclick = function () {
    --numComic;
    showCard(idp);
  };
  btn2.onclick = function () {
    ++numComic;
    showCard(idp);
  };

  squareInfo.onclick = function (e) {
    e.stopPropagation();
  }

  title.innerHTML = 'Title: ' + titlep;
  console.log(descriptionp)
  description.innerHTML = 'Description: ' + maxCaract(descriptionp,190);
  page.innerHTML = 'Page count: ' + pagep;
  issue.innerHTML = 'Issue number: ' + issuep;

  cont.appendChild(title);
  cont.appendChild(description);
  cont.appendChild(page);
  cont.appendChild(issue);

  squareInfo.appendChild(btn1);
  squareInfo.appendChild(btn2);
  squareInfo.appendChild(cont);
  squareInfo.classList.add('squareInfo');
  document.getElementById('moreData').appendChild(squareInfo);
}

const deleteCharacter = () => {
  Array.from(document.querySelectorAll('#noborrar > div')).forEach(element => {
    element.parentNode.removeChild(element);
  });
}

const deleteComic = () => {
  Array.from(document.querySelectorAll('#moreData > div')).forEach(element => {
    element.parentNode.removeChild(element);
  });
}

const showCard = (id) => {

  peticionAJAX('GET', `${base}/${id}/comics?format=comic&${apiHash}`, function (datos) {

    if (numComic < datos.data.results.length && numComic >= 0) {
      let comic = datos.data.results[numComic];
      createComic(comic.title, comic.description, comic.pageCount, comic.issueNumber, `${comic.thumbnail.path}/portrait_uncanny.${comic.thumbnail.extension}`, id)
    }
    document.getElementById(id + '2').disabled = numComic >= (datos.data.results.length - 1);
  });
}

const maxCaract = (text,max) => {  
  return (text.length > max) ? text.substring(0,max) : text;
}

const peticionAJAX = (metodo, url, callback) => {
  const peticion = new XMLHttpRequest();

  peticion.open(metodo, url);
  peticion.send();
  document.getElementById('load').style.visibility = 'visible';
  peticion.onreadystatechange = () => {
    if (peticion.readyState == 4 && peticion.status == 200) {
      document.getElementById('load').style.visibility = 'hidden';
      callback(JSON.parse(peticion.responseText));
    }
  }
};