import { Component, OnInit } from '@angular/core';
import { PajaxService } from 'src/app/services/pajax.service';

@Component({
  selector: 'app-principal',
  templateUrl: './principal.component.html',
  styleUrls: ['./principal.component.sass']
})
export class PrincipalComponent implements OnInit {

  public facturas;
  constructor(private peti : PajaxService) { }

  ngOnInit(): void {
    this.peti.getFactura().subscribe(
      data => this.facturas = data
    )
  }

}
