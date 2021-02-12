import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Vet } from '../Models/vet';

@Injectable({
  providedIn: 'root'
})
export class VetService {

  private url : string = "http://localhost/serviciosweb/petclinic/servicios.php";
  public vets;

  constructor(private peti : HttpClient) { }

  getVets(){
    return this.peti.post<Vet[]>(this.url,JSON.stringify({"accion": "ListarVets"}));
  }
  getOneVet(id : number){
    return this.peti.post<Vet>(this.url,JSON.stringify({"accion": "ObtenerVetId", "id" : id}));
  }
  addVet(vet : Vet){
    return this.peti.post<Vet>(this.url,JSON.stringify({"accion": "AnadeVet", "vet" : vet}));
  }
  delVet(id : number){
    return this.peti.post<Vet>(this.url,JSON.stringify({"accion": "BorraVet", "id" : id}));
  }
}


