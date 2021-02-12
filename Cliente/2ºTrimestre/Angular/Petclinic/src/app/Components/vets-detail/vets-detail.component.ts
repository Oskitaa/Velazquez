import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Vet } from 'src/app/Models/vet';
import { VetService } from 'src/app/Services/vet.service';

@Component({
  selector: 'app-vets-detail',
  templateUrl: './vets-detail.component.html',
  styleUrls: ['./vets-detail.component.css']
})
export class VetsDetailComponent implements OnInit {

  public vet : Vet;

  constructor(private petiVets : VetService, router : Router,private params : ActivatedRoute) { }

  ngOnInit(): void {
    let id = this.params.snapshot.params.id;
    this.petiVets.getOneVet(id).subscribe( data => {
      this.vet = data;
    } );

  }

}
