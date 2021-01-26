import { Component, Input, OnChanges } from '@angular/core';
import { PAjaxService } from '../pajax.service';

@Component({
  selector: 'app-datos-planeta',
  templateUrl: './datos-planeta.component.html',
  styleUrls: ['./datos-planeta.component.css']
})
export class DatosPlanetaComponent implements  OnChanges {

  @Input() urlPlanet : string;
  data : any = null;

  constructor(private peti : PAjaxService) { }

  ngOnChanges(){
    this.peti.changePage(this.urlPlanet)
    .subscribe(datos => {
      this.data = datos;
    }
    ,error => console.log(error));
  }
}
