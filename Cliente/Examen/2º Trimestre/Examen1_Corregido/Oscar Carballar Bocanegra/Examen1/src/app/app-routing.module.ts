import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListaDetalleComponent } from './components/lista-detalle/lista-detalle.component';
import { PrincipalComponent } from './components/principal/principal.component';

const routes: Routes = [
  {
      path: "",
      component: PrincipalComponent 
  },
  {
    path: "factura/:id/:numero",
    component: ListaDetalleComponent 
}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
