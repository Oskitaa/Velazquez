import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './Components/home/home.component';
import { OwnersComponent } from './Components/owners/owners.component';
import { HttpClientModule} from "@angular/common/http";
import { FormsModule } from '@angular/forms';
import { DetailsOWnerComponent } from './Components/details-owner/details-owner.component';
import { FormOwnerComponent } from './Components/form-owner/form-owner.component';
import { VetsComponent } from './Components/vets/vets.component';
import { VetsDetailComponent } from './Components/vets-detail/vets-detail.component';
import { FormVetComponent } from './Components/form-vet/form-vet.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    OwnersComponent,
    DetailsOWnerComponent,
    FormOwnerComponent,
    VetsComponent,
    VetsDetailComponent,
    FormVetComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
