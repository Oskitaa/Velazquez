import { formatCurrency } from '@angular/common';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DetailsOWnerComponent } from './Components/details-owner/details-owner.component';
import { FormOwnerComponent } from './Components/form-owner/form-owner.component';
import { FormVetComponent } from './Components/form-vet/form-vet.component';
import { HomeComponent } from './Components/home/home.component';
import { OwnersComponent } from './Components/owners/owners.component';
import { VetsDetailComponent } from './Components/vets-detail/vets-detail.component';
import { VetsComponent } from './Components/vets/vets.component';

const routes: Routes = [
  {
    path: "",
    component: HomeComponent
  },
  {
    path: "owners",
    component: OwnersComponent
  },
  {
    path: "owners/:id",
    component: DetailsOWnerComponent
  },
  {
    path: "owners-add/:id",
    component: FormOwnerComponent
  },
  {
    path: "veterinarios",
    component: VetsComponent
  },
  {
    path: "veterinarios/:id",
    component: VetsDetailComponent
  },
  {
    path: "vets-add/:id",
    component: FormVetComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
