import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Estadocivil } from '../modelos/estadocivil';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class EstadocivilService {
  
  private URL = environment.url;
  constructor(private peti : HttpClient) { }

  getEstadosCiviles(){
    return this.peti.post<Estadocivil[]>(this.URL,JSON.stringify({"accion": 9}));
  }

  
}
