import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Persona } from "./personas";

@Injectable({
  providedIn: 'root'
})
export class PajaxService {
  url : string = 'http://localhost/serviciosWeb/listapersonas/servidor.php';
  

  constructor(private peti : HttpClient) { }

  listaPersonas(){
    return this.peti.post<Persona[]>(this.url,{"servicio":"listar"});
  }
  
  agregarPersonas(Persona : Persona){
    let body  = {
      "servicio": "insertar",
      "dni": Persona.DNI,
      "nombre" : Persona.NOMBRE,
      "apellidos" : Persona.APELLIDOS
  };
    return this.peti.post<Persona>(this.url,body);
  }

  selPersonaID(id : number){
    return this.peti.post<Persona>(this.url,{"servicio": "selPersonaID","id" : id});
  }

  editarPersonas(Persona : Persona){
    let body  = {
      "servicio": "modificar",
      "dni": Persona.DNI,
      "nombre" : Persona.NOMBRE,
      "apellidos" : Persona.APELLIDOS,
      "id" : Persona.ID
  };
    return this.peti.post<Persona>(this.url,body);
  }

  borrarPersona(id : number){
    return this.peti.post<Persona[]>(this.url,{"servicio": "borrar","id" : id});
  }

}
