import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { PajaxService } from '../pajax.service';
import { Persona } from "../personas";
@Component({
  selector: 'app-aniadir-persona',
  templateUrl: './aniadir-persona.component.html',
  styleUrls: ['./aniadir-persona.component.sass']
})
export class AniadirPersonaComponent implements OnInit {

  public persona : Persona;
  txtBtn : string = "Añadir";
  constructor(private peti: PajaxService, private router: Router,private arouter: ActivatedRoute) { 
    this.persona = <Persona>{};
  }

  addMod(){
    if(this.arouter.snapshot.params.id == -1){
    this.peti.agregarPersonas(this.persona).subscribe(d => this.router.navigate(['/']));
    } else {
      this.peti.editarPersonas(this.persona).subscribe(d => this.router.navigate(['/']));
    }
    
  }

  ngOnInit(): void {
    if(this.arouter.snapshot.params.id != -1){
      this.txtBtn = "Editar";
      this.peti.selPersonaID(this.arouter.snapshot.params.id ).subscribe(datos => this.persona = datos);
    } 
    
  }

}
