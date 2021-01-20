import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-select',
  templateUrl: './select.component.html',
  styleUrls: ['./select.component.css']
})
export class SelectComponent implements OnInit {
  @Input() opciones : Array<Object>;
  opSel : Object = null;

  constructor() {}

  seleccion(args: any){
    console.log(args);
    
  }

  ngOnInit(): void {
    this.opciones.unshift({id:-1,op:"Seleccione un valor"});
    this.opSel = this.opciones[0];
  }

}
