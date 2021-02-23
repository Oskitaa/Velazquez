import { Estadocivil } from "./estadocivil";

export interface Alumnos {

    ID : Number,
    NOMBRE : String,
    APELLIDOS : String,
    SEXO : Estadocivil,
    SEXO_NOMBRE : String,
    FECHA_NACIMIENTO : Date, 
    ESTADO_CIVIL : Estadocivil,
    NOMBRE_EC : String

}
