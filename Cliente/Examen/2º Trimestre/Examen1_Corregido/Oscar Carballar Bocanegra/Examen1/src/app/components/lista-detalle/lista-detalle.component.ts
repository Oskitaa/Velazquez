import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Detalle } from 'src/app/models/detalle';
import { PajaxService } from 'src/app/services/pajax.service';

@Component({
  selector: 'app-lista-detalle',
  templateUrl: './lista-detalle.component.html',
  styleUrls: ['./lista-detalle.component.sass']
})
export class ListaDetalleComponent implements OnInit {

  public detalles : Detalle[];
  public num;
  public hform : boolean;
  public detalleSel : Detalle;
  public txtBtn : string;

  constructor(private peti: PajaxService,private route : ActivatedRoute, private router : Router) { 
    this.detalleSel = <Detalle>{};
    this.num = this.route.snapshot.params.numero;
    this.hform = false;
    this.txtBtn = "Añadir";
  }

  calcularIVa(item : Detalle[]){
    let total : number = 0;
    item?.forEach(
      data=>{
        total += data.cantidad *data.precio *data.tipo_iva/100;
      }
    )
      return total;
  }

  calcularTotalIVa(item : Detalle[]){
    let total : number = 0;
    item?.forEach(
      data=>{
        total += data.cantidad *data.precio *data.tipo_iva/100 + data.cantidad *data.precio;
      }
    )
      return total;
  }

  ocularForm(){
    this.hform = (this.hform) ? false : true;
    this.txtBtn = (this.txtBtn = "Editar") ? "Añadir" : "Editar";
    this.detalleSel = <Detalle>{};
  }

  changeSelc(item : Detalle){
    this.txtBtn = "Editar";
    this.hform = true;
    this.detalleSel = JSON.parse(JSON.stringify(item));
  }

  addMod(){
    if(this.txtBtn == "Añadir"){
      this.detalleSel.id_factura = this.route.snapshot.params.id;
      this.peti.addDetalle(this.detalleSel).subscribe(d => this.detalles = d);
    }else{
      this.peti.modDetalle(this.detalleSel,this.route.snapshot.params.id).subscribe(d => this.detalles = d);
      this.txtBtn = "Añadir"
      this.detalleSel = <Detalle>{};
    }
    this.ocularForm();
  }

  deleteDetalle(detalle : Detalle){
    if(confirm("Desea borrar el detalle " + detalle.id)){
      this.peti.deleteDetalle(detalle.id,detalle.id_factura).subscribe(
        data =>{ 
          this.detalles = data;
        }
      );
      this.txtBtn = "Añadir";
    this.hform = false;
    }
  }

  ngOnInit(): void {
    this.peti.getDetalle(this.route.snapshot.params.id).subscribe(
      data =>{ 
        this.detalles = data;
      }
    )
  }

}

