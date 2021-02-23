import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Alumnos } from 'src/app/modelos/alumnos';
import { AlumnoService } from 'src/app/servicios/alumno.service';

@Component({
  selector: 'app-alumno-del',
  templateUrl: './alumno-del.component.html',
  styleUrls: ['./alumno-del.component.css']
})
export class AlumnoDelComponent implements OnInit {

  @Input() alumno : Alumnos;
  @Output() alumnos = new EventEmitter<Alumnos[]>();

  constructor(private peti : AlumnoService) { }

  delAlumno(id : Number = null){
    this.peti.borrarAlumno(id).subscribe(d => {
      this.alumnos.emit(d);
    })
  }

  ngOnInit(): void {
  
  }

}
