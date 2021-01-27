import { Component, OnInit } from '@angular/core';
import { Persona } from "../personas";
@Component({
  selector: 'app-aniadir-persona',
  templateUrl: './aniadir-persona.component.html',
  styleUrls: ['./aniadir-persona.component.sass']
})
export class AniadirPersonaComponent implements OnInit {

  public persona : Persona;
  constructor() { }

  ngOnInit(): void {
  }

}
