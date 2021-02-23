import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Alumnos } from 'src/app/modelos/alumnos';
import { Estadocivil } from 'src/app/modelos/estadocivil';
import { AlumnoService } from 'src/app/servicios/alumno.service';
import { EstadocivilService } from 'src/app/servicios/estadocivil.service';
import { SexoService } from 'src/app/servicios/sexo.service';

@Component({
  selector: 'app-alumno-form',
  templateUrl: './alumno-form.component.html',
  styleUrls: ['./alumno-form.component.css']
})
export class AlumnoFormComponent implements OnInit {

  alumno : Alumnos;
  sexos : Estadocivil[];
  estado : Estadocivil[];
  private id : number;
  etiqueta : String;

  constructor(private petiAlumno : AlumnoService,private petiEstado : EstadocivilService, private petiSexo : SexoService, private params : ActivatedRoute, private route : Router) { 
    this.id = this.params.snapshot.params.id;
    this.alumno = <Alumnos>{};
    this.etiqueta = "Añadir";
  }

  onSubmit(alumno : Alumnos){
    if(this.id ==-1){
      this.petiAlumno.addAlumno(alumno).subscribe(d =>
        this.route.navigate(["/alumnos"])
      )
    } else{
      alumno.ID =this.id;
      this.petiAlumno.editAlumno(alumno).subscribe(d =>
        this.route.navigate(["/alumnos"])
      )
    }
  }

  ngOnInit(): void {
    if(this.id !=-1){
      this.petiAlumno.getOneAlumno(this.id).subscribe(d => this.alumno = d)
      this.etiqueta = "Editar";
    }
    
    this.petiEstado.getEstadosCiviles().subscribe(d => this.estado = d)
    this.petiSexo.getSexo().subscribe(d => this.sexos = d)

  }

}
