import { Component, OnInit } from '@angular/core';
import { Vet } from 'src/app/Models/vet';
import { VetService } from 'src/app/Services/vet.service';

@Component({
  selector: 'app-vets',
  templateUrl: './vets.component.html',
  styleUrls: ['./vets.component.css']
})
export class VetsComponent implements OnInit {

  public vets : Vet[];

  constructor(private petiVet : VetService) { }

  deleteVet(vet : Vet){
    if(confirm(`Desea borrar a ${vet.firstName}`)){
      this.petiVet.delVet(vet.id).subscribe(d => {
        this.vets.splice(this.vets.indexOf(vet),1);
      });
    }
  }

  ngOnInit(): void {
    this.petiVet.getVets().subscribe(data => this.vets = data );
  }

}
