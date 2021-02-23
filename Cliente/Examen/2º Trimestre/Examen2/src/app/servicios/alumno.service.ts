import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { Alumnos } from '../modelos/alumnos';

@Injectable({
  providedIn: 'root'
})
export class AlumnoService {

  private url = environment.url;

  constructor(private peti : HttpClient) {}

  getAlumnos() {
    return this.peti.post<Alumnos[]>(this.url,JSON.stringify({"accion":3}));
  }

  getOneAlumno(id : Number){
    return this.peti.post<Alumnos>(this.url,JSON.stringify({"accion": 4,"ID" : id}));
  }

  addAlumno(alumno : Alumnos){
    let dato  = JSON.stringify({
        "accion": 0,
        "NOMBRE": alumno.NOMBRE,
        "APELLIDOS": alumno.APELLIDOS,
        "SEXO": alumno.SEXO,
        "FECHA_NACIMIENTO": alumno.FECHA_NACIMIENTO,
        "ESTADO_CIVIL": alumno.ESTADO_CIVIL
    });
    return this.peti.post(this.url,dato);
  }

  
  editAlumno(alumno : Alumnos){
    let dato  = JSON.stringify({
        "accion": 1,
        "ID": alumno.ID,
        "NOMBRE": alumno.NOMBRE,
        "APELLIDOS": alumno.APELLIDOS,
        "SEXO": alumno.SEXO,
        "FECHA_NACIMIENTO": alumno.FECHA_NACIMIENTO,
        "ESTADO_CIVIL": alumno.ESTADO_CIVIL
    });
    console.log(dato);
    return this.peti.post(this.url,dato);
  }

  borrarAlumno(id : Number){
    return this.peti.post<Alumnos[]>(this.url,JSON.stringify({"accion": 2,"ID" : id}));
  }
}
