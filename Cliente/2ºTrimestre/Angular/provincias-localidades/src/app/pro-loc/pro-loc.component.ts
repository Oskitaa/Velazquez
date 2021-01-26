import { Component, OnInit } from '@angular/core';
import { PAjaxService } from "../p-ajax.service";

@Component({
  selector: 'app-pro-loc',
  templateUrl: './pro-loc.component.html',
  styleUrls: ['./pro-loc.component.css']
})
export class ProLocComponent implements OnInit {
  t  = [];
  t2 = [];
  opSel = null;
  constructor(private peti : PAjaxService) {
    this.opSel = {CODIGO:-1,NOMBRE:"Seleccione una provincia"};
   } 

  seleccion(){
    this.peti.pedirLocalidades(this.opSel.CODIGO)
    .subscribe(datos => {
      this.t2=datos;
    },error => console.log(error))

  }

  ngOnInit(): void {
      this.peti.pedirProvincias().subscribe(datos => {
        this.t=datos;
        this.t.unshift(this.opSel);
      },error => console.log(error))
  } 

  

}
