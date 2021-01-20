import { Component, Input, OnInit } from '@angular/core';


@Component({
  selector: 'app-component-hobbit',
  templateUrl: './component-hobbit.component.html',
  styleUrls: ['./component-hobbit.component.css']
})
export class ComponentHobbitComponent implements OnInit {

  public hobbits: string[] ;
  @Input() public  newHobbit : string ;
  public accion : {id : number ,nombre : string, indice : number};
  show : boolean = false;
  
  constructor() {
      this.hobbits = ["Hobbit 1","Andres hobbit", "hobbit oscar"];
      this.newHobbit = "";
      this.accion = {id : 1, nombre : "Añadir", indice: -1};
   }
  
  addHobbit(){
    if(this.newHobbit.length && this.accion.id == 1){
      this.hobbits.push(this.newHobbit);
    }
    if( this.accion.id == 2){
      this.hobbits[this.accion.indice] = this.newHobbit;
      this.accion = {id : 1 ,nombre : "Añadir",indice : -1};
    }
    this.newHobbit = "";
  }

  delHObbit(i : number){
    if(confirm("Desea borrar a " + this.hobbits[i])){
      this.hobbits.splice(i,1);
    }
  }

  editHobbit(i : number){
    this.accion = {id : 2 ,nombre : "Modificar",indice : i};
    this.newHobbit = this.hobbits[i];
    this.toggleShow();
  }

  cancel(){
    this.toggleShow();
    this.accion = {id : 1 ,nombre : "Añadir",indice : -1};
    this.newHobbit = "";
  }

  toggleShow(){
    this.show = ! this.show;
  }

  ngOnInit(): void {
  }

}
