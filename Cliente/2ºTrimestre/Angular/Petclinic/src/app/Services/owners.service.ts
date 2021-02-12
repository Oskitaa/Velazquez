import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Owner } from '../Models/owner';

@Injectable({
  providedIn: 'root'
})

export class OwnersService {

  private url : string = "http://localhost/serviciosweb/petclinic/servicios.php";

  constructor(private httpClient : HttpClient) { }

  getOwners(){
    return this.httpClient.post<Owner[]>(this.url,JSON.stringify({
      "accion":"ListarOwners"
    }));
  }

  getOneOwner(id : number){
    return this.httpClient.post<Owner>(this.url,{
      "accion":"ObtenerOwnerId",
      "id" : id
    });
  }

  addOwner(owner : Owner){
    return this.httpClient.post<Owner>(this.url,{
      "accion":"AnadeOwner",
        owner
    });
  }

  modOwner(owner : Owner){
    return this.httpClient.post<Owner>(this.url,JSON.stringify({
      "accion":"ModificaOwner",
        owner
    }));
  }

  delOwner(id : number, listado : String = ""){
    return this.httpClient.post<Owner[]>(this.url,JSON.stringify({
      "accion":"BorraOwner",
      "id" : id,
      "listado" : listado      
    }));
  }

  
}

