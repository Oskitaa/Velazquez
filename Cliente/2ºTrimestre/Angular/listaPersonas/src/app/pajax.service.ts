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
    body  = {
      "servicio": "insertar",
      "dni": Persona.DNI,
      "nombre" : Persona.NOMBRE,
      "apellidos" : Persona.APELLIDOS
  };
    return this.peti.post<Persona[]>(this.url,body);
  }

}
