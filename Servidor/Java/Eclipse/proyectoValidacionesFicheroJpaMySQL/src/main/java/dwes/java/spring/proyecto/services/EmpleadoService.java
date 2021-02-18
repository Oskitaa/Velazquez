package dwes.java.spring.proyecto.services;

import dwes.java.spring.proyecto.models.Empleado;

import java.util.List;

public interface EmpleadoService {

    public Empleado add(Empleado e);
    public List<Empleado> findAll();
    public Empleado findById(long id);
    public  Empleado edit(Empleado e);

}
