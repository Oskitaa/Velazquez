import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Provincia } from './provincia';
import { Localidad } from './localidad';

@Injectable({
  providedIn: 'root'
})

export class PAjaxService {

  private url: string = 'http://localhost/serviciosweb/provinciaslocalidades/servidor.php';

  constructor(private httpClient: HttpClient) { }
  
  pedirProvincias(){
    let dir = this.url + '?servicio=provincias';
     return this.httpClient.get<Provincia[]>(dir);
  }

  pedirLocalidades(cp : number){
    let dir = this.url + '?servicio=localidades&codigop='+cp;
     return this.httpClient.get<Localidad[]>(dir);
  }
}