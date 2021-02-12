import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Owner } from 'src/app/Models/owner';
import { OwnersService } from 'src/app/Services/owners.service';

@Component({
  selector: 'app-details-owner',
  templateUrl: './details-owner.component.html',
  styleUrls: ['./details-owner.component.css']
})
export class DetailsOWnerComponent implements OnInit {

  public owner : Owner;

  constructor(private petiOwner : OwnersService, private route : ActivatedRoute,private router : Router) { }


  deleteOwner(owner : Owner){
    if(confirm("Desea borrar a " + owner.firstName)){
      this.petiOwner.delOwner(<number>owner.id).subscribe();
      this.router.navigate(['/owners']);
    }
  }

  ngOnInit(): void {
    let id = this.route.snapshot.params.id;

    this.petiOwner.getOneOwner(id).subscribe(
      data => {
        this.owner = data;
      }
    )
  }

}
