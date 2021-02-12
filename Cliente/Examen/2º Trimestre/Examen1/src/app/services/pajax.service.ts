import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Detalle } from '../models/detalle';

@Injectable({
  providedIn: 'root'
})
export class PajaxService {
  private url : string = "http://localhost/serviciosweb/examen/servidor.php";
  constructor(private peti: HttpClient) { }

  getFactura(){
    return this.peti.post(this.url,JSON.stringify({"servicio" : "facturas"}));
  }

  getDetalle(id : number){
    return this.peti.post<Detalle[]>(this.url,JSON.stringify({"servicio" : "detalle","id" : id}));
  }

  deleteDetalle(id : number,id_fra : number){
    return this.peti.post<Detalle[]>(this.url,JSON.stringify({"servicio" : "borra","id" : id,"id_factura" : id_fra}));
  }

  addDetalle(detalle : Detalle){
    return this.peti.post<Detalle[]>(this.url,JSON.stringify({"servicio" : "anade","detalle" : detalle}));
  }

  modDetalle(detalle : Detalle,id_fra : number){
    return this.peti.post<Detalle[]>(this.url,JSON.stringify({"servicio" : "modifica","detalle" : detalle,"id_factura" : id_fra}));
  }

}



