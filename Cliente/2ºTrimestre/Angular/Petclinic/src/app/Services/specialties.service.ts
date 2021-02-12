import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Especialties } from '../Models/especialties';

@Injectable({
  providedIn: 'root'
})
export class SpecialtiesService {

  public : Especialties;

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
