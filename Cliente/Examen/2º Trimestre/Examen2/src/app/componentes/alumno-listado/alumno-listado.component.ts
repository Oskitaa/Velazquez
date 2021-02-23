import { Component, OnInit } from '@angular/core';
import { Alumnos } from 'src/app/modelos/alumnos';
import { AlumnoService } from 'src/app/servicios/alumno.service';
import { EstadocivilService }
 from 'src/app/servicios/estadocivil.service';
import { SexoService } from 'src/app/servicios/sexo.service';

@Component({
  selector: 'app-alumno-listado',
  templateUrl: './alumno-listado.component.html',
  styleUrls: ['./alumno-listado.component.css']
})
export class AlumnoListadoComponent implements OnInit {

  public alumnos : Alumnos[];
  public alumno : Alumnos;
  visible : boolean;

  constructor(private petiAlumno : AlumnoService,private petiEstado : EstadocivilService, private petiSexo : SexoService) { 
    this.alumnos = <Alumnos[]>{};
    this.visible = false;
  }

  toggleVisible(alumno : Alumnos = null){
    this.visible = !this.visible;
    this.alumno = JSON.parse(JSON.stringify(alumno));
  }

  borra(alumnos : Alumnos[]){
    if(alumnos != []){
      this.alumnos = alumnos;
    }
    this.toggleVisible();
  }

  ngOnInit(): void {
    this.petiAlumno.getAlumnos().subscribe(
      d => this.alumnos = d
    )
  }

}
