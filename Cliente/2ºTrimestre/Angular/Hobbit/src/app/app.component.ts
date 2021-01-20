import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Hobbit';

  public datos : Array<Object>;

  constructor(){
    this.datos = [
      {id:1,op:"Opcion 1"},
      {id:2,op:"Opcion 2"},
      {id:3,op:"Opcion 3"},
      {id:4,op:"Opcion 4"},
      {id:5,op:"Opcion 5"}
    ];
  }
}
