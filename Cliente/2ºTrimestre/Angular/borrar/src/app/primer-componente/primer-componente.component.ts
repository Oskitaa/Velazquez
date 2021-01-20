import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-primer-componente',
  templateUrl: './primer-componente.component.html',
  styleUrls: ['./primer-componente.component.css']
})
export class PrimerComponenteComponent implements OnInit {

    tittle : string;

  constructor() {
    this.tittle = "Esto es un titulo";
   }

  ngOnInit(): void {
  }

}
