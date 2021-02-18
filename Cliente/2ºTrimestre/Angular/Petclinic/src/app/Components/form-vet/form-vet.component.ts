import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Especialties } from 'src/app/Models/especialties';
import { Vet } from 'src/app/Models/vet';
import { SpecialtiesService } from 'src/app/Services/specialties.service';
import { VetService } from 'src/app/Services/vet.service';

@Component({
  selector: 'app-form-vet',
  templateUrl: './form-vet.component.html',
  styleUrls: ['./form-vet.component.css']
})
export class FormVetComponent implements OnInit {

  public vet : Vet;
  public especialidad : Especialties[];
  private idVet : number;
  public etiqueta : string;

  constructor(private petiVet : VetService,private param : ActivatedRoute, private petiEspe : SpecialtiesService,private route : Router) { 
    this.idVet = this.param.snapshot.params.id;
    this.vet = <Vet>{};
    this.etiqueta = "Añadir";
  }

  onSubmit(a ){
    a.specialties = a.specialties.map(e => {
      return {"id" : e.id || e}
    });

    if(this.idVet == -1){
      this.petiVet.addVet(a).subscribe();
    }
    else{
      a.id = this.idVet;
      this.petiVet.ModVet(a).subscribe();
    }
    this.route.navigate(["/veterinarios"]);
  }

  ngOnInit(): void {  
    if(this.idVet != -1){
      this.petiVet.getOneVet(this.idVet).subscribe(d =>{
        console.log(d.specialties);
        this.vet = d;
        this.etiqueta = "Editar";
      });
    }
    this.petiEspe.getSpecialties().subscribe(d => this.especialidad = d)
  }

}
