import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Owner } from 'src/app/Models/owner';
import { OwnersService } from 'src/app/Services/owners.service';

@Component({
  selector: 'app-form-owner',
  templateUrl: './form-owner.component.html',
  styleUrls: ['./form-owner.component.css']
})
export class FormOwnerComponent implements OnInit {

  public owner : Owner;
  public etiqueta : String;
  public idOwner : number;

  constructor(private petiOwner : OwnersService,private router : Router,private params : ActivatedRoute) { 
    this.owner = <Owner>{};
    this.etiqueta = "Añadir";
    this.idOwner = this.params.snapshot.params.id;
  }

  onSubmit(f : Owner){
  
    if(this.idOwner == -1){
      this.petiOwner.addOwner(f).subscribe( d => this.router.navigate(['/owners']));
    } else{
      f.id = this.idOwner;
      this.petiOwner.modOwner(f).subscribe( d =>{ this.router.navigate(['/owners'])});
    }
    
  }

  ngOnInit(): void {
    if(this.idOwner != -1){
      this.petiOwner.getOneOwner(this.idOwner).subscribe(data => this.owner = data);
      this.etiqueta = "Editar";
    }
  }

}
