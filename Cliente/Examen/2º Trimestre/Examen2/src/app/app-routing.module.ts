import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AlumnoFormComponent } from './componentes/alumno-form/alumno-form.component';
import { AlumnoListadoComponent } from './componentes/alumno-listado/alumno-listado.component';
import { EstadoscivilesComponent } from './componentes/estadosciviles/estadosciviles.component';
import { InicioComponent } from './componentes/inicio/inicio.component';

const routes: Routes = [
  {
    path:"inicio",
    component:InicioComponent
  },
  {
    path:"alumnos",
    component: AlumnoListadoComponent
  },
  {
    path:"estadocivil",
    component: EstadoscivilesComponent
  },
  {
    path:"alumnos/addmod/:id",
    component:AlumnoFormComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
