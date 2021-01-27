import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListadoComponent } from './listado/listado.component';
import { AniadirPersonaComponent } from "./aniadir-persona/aniadir-persona.component";

const routes: Routes = [
  {
    path: "",
    component: ListadoComponent
  },
  {
    path : "persona-addmod/:id",
    component: AniadirPersonaComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
