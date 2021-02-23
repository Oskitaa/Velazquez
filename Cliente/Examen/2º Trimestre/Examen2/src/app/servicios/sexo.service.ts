import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { Estadocivil } from '../modelos/estadocivil';

@Injectable({
  providedIn: 'root'
})
export class SexoService {

  private url = environment.url

  constructor(private peti : HttpClient) { }

  getSexo(){
    return this.peti.post<Estadocivil[]>(this.url,JSON.stringify({"accion" :5}));
  }
}
