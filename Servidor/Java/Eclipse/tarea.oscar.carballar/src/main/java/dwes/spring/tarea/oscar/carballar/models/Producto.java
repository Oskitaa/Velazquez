package dwes.spring.tarea.oscar.carballar.models;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@Entity
public class Producto {

    @Id
    @GeneratedValue
    private long id;

    @Column(nullable=false)
    @Size(min=3, message = "Minimo 3 caracteres")
    private String nombre;

    @Column(nullable=false, columnDefinition = "Text")
    private String descripcion;

    @Column(nullable=false)
    @NotNull(message = "No puede estar vacio")
    private  double precio;

    @Column(nullable=false)
    @NotNull(message = "No puede estar vacio")
    private  int unidades;
    private String imagen;

    public Producto(long id,String nombre, String descripcion, double precio, int unidades, String imagen) {
        this.id = id;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.precio = precio;
        this.unidades = unidades;
        this.imagen = imagen;
    }

    public Producto() {
    }

    public Producto(String nombre, String descripcion, double precio, int unidades, String imagen) {
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.precio = precio;
        this.unidades = unidades;
        this.imagen = imagen;
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

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public int getUnidades() {
        return unidades;
    }

    public void setUnidades(int unidades) {
        this.unidades = unidades;
    }

    public String getImagen() {
        return imagen;
    }

    public void setImagen(String imagen) {
        this.imagen = imagen;
    }

    @Override
    public String toString() {
        return "Producto{" +
                "id=" + id +
                ", nombre='" + nombre + '\'' +
                ", descripcion='" + descripcion + '\'' +
                ", precio=" + precio +
                ", unidades=" + unidades +
                ", imagen='" + imagen + '\'' +
                '}';
    }
}
