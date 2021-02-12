import { Component, OnInit } from '@angular/core';
import { Owner } from 'src/app/Models/owner';
import { OwnersService } from 'src/app/Services/owners.service';

@Component({
  selector: 'app-owners',
  templateUrl: './owners.component.html',
  styleUrls: ['./owners.component.css']
})
export class OwnersComponent implements OnInit {

  public Owners : Owner[];

  constructor(private petiOwner : OwnersService) { }


  
  deleteOwner(owner : Owner){
    console.log(owner);
    if(confirm("Desea borrar a " + owner.firstName)){
      this.petiOwner.delOwner(<number>owner.id,"OK").subscribe( d => this.Owners = d);
    }
  }

  ngOnInit(): void {

    this.petiOwner.getOwners().subscribe(
      data => {
        this.Owners = data;
        console.log(data);
      }
    )}

}
