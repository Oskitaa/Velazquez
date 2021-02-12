package dwes.java.spring.proyecto.models;

import java.io.File;

import javax.validation.constraints.Email;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.Size;

public class Empleado {
	
	
	private long id;
	
	@NotEmpty(message = "El nombre no puede estar vacio")
	@Size(min=3,max=100,message = "Minimo 3 caracteres y maximo 100.")
	private String nombre;
	
	@NotEmpty(message = "El email no puede estar vacio")
	@Email
	private String email;
	private String telefono;
	private String ruta;
	
	public Empleado() {
		this.id = 0;
		this.nombre = "";
		this.email = "";
		this.telefono = "";
		this.ruta = "";
	}

	public Empleado(long id, String nombre, String email, String telefono) {
		this.id = id;
		this.nombre = nombre;
		this.email = email;
		this.telefono = telefono;
		this.ruta = "";
	}


	public long getId() {
		return id;
	}


	public void setId(long id) {
		this.id = id;
	}


	public String getNombre() {
		return nombre;
	}


	public void setNombre(String nombre) {
		this.nombre = nombre;
	}


	public String getEmail() {
		return email;
	}


	public void setEmail(String email) {
		this.email = email;
	}


	public String getTelefono() {
		return telefono;
	}


	public void setTelefono(String telefono) {
		this.telefono = telefono;
	}

	public String getRuta() {
		return ruta;
	}

	public void setRuta(String ruta) {
		this.ruta = ruta;
	}
	
}
