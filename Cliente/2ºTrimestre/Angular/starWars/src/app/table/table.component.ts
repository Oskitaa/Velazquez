import { Component, OnInit } from '@angular/core';
import { PAjaxService } from "../pajax.service";

@Component({
  selector: 'app-table',
  templateUrl: './table.component.html',
  styleUrls: ['./table.component.css']
})
export class TableComponent implements OnInit{

  data = null
  url : string ='https://swapi.dev/api/people/';
  urlPlaneta :string;

  constructor(private peti : PAjaxService) { }

  siguiente(){
    this.peti.changePage(this.data.next)
    .subscribe(datos => {
      this.data = datos;
    }
    ,error => console.log(error));
  }

  anterior(){
    this.peti.changePage(this.data.previous)
    .subscribe(datos => {
      this.data = datos;
    }
    ,error => console.log(error));
  }

  planeta($event){
    $event.preventDefault();
    this.urlPlaneta = $event.path[0].href;
  }

  ngOnInit(): void {
    this.peti.changePage(this.url)
    .subscribe(datos => {
      this.data = datos;
    }
    ,error => console.log(error));

  }
}