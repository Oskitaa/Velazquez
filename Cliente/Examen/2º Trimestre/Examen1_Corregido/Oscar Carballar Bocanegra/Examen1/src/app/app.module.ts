import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from "@angular/common/http";
import { PrincipalComponent } from './components/principal/principal.component';
import { ListaDetalleComponent } from './components/lista-detalle/lista-detalle.component';
@NgModule({
  declarations: [
    AppComponent,
    PrincipalComponent,
    ListaDetalleComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
