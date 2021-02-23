import { Component, OnInit } from '@angular/core';
import { Estadocivil } from 'src/app/modelos/estadocivil';
import { EstadocivilService } from 'src/app/servicios/estadocivil.service';

@Component({
  selector: 'app-estadosciviles',
  templateUrl: './estadosciviles.component.html',
  styleUrls: ['./estadosciviles.component.css']
})
export class EstadoscivilesComponent implements OnInit {

  public estados : Estadocivil[];

  constructor(private peti : EstadocivilService) { }

  ngOnInit(): void {

    this.peti.getEstadosCiviles().subscribe(
      d => this.estados = d
    )

  }

}
