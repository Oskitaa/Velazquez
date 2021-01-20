import { Component } from '@angular/core';

@Component({
  selector: 'app-hola-mundo',
  templateUrl: './hola-mundo.component.html',
  styleUrls: ['./hola-mundo.component.css']
})
export class HolaMundoComponent{
  titulico = "Que bueno que viniste oye!!!";
 
  cosicas = ['Pan','Casa', 'Camino','Destino'];

  binding = "Test";
  count = 0;
  cambiar(){
    this.binding = "Hola test";
  }

  suma(){
    this.count++; 
  }
}
 