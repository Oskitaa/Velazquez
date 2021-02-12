import { Component, OnInit } from '@angular/core';
import { PajaxService } from "../pajax.service";
import { Persona } from "../personas";

@Component({
  selector: 'app-listado',
  templateUrl: './listado.component.html',
  styleUrls: ['./listado.component.sass']
})
export class ListadoComponent implements OnInit {
  personas : Persona[];
  constructor(private peti: PajaxService) { }

  borrar(item : Persona){
    if(confirm("Desea borrar a " + item.NOMBRE)){
      this.peti.borrarPersona(item.ID).subscribe(datos => this.personas = datos);
    }
  }

  ngOnInit(): void {
    this.peti.listaPersonas().subscribe(datos => {
      this.personas = datos;
    },error => console.log(error))
  }

}
