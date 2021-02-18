import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Especialties } from '../Models/especialties';

@Injectable({
  providedIn: 'root'
})
export class SpecialtiesService {

  public : Especialties;
  private url : string = "http://localhost/serviciosweb/petclinic/servicios.php";
  constructor(private peti : HttpClient) { }

  getSpecialties(){
    return this.peti.post<Especialties[]>(this.url,JSON.stringify({"accion": "ListarSpecialties"}));
  }
  /*
  getOneVet(id : number){
    return this.peti.post<Vet>(this.url,JSON.stringify({"accion": "ObtenerVetId", "id" : id}));
  }
  addVet(vet : Vet){
    return this.peti.post<Vet>(this.url,JSON.stringify({"accion": "AnadeVet", "vet" : vet}));
  }
  delVet(id : number){
    return this.peti.post<Vet>(this.url,JSON.stringify({"accion": "BorraVet", "id" : id}));
  }
  */
}
