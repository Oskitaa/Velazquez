package dwes.java.spring.proyecto.services;

import dwes.java.spring.proyecto.models.Empleado;
import dwes.java.spring.proyecto.repository.EmpleadoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Service;

import java.util.List;

@Primary
@Service("EmpleadoServiceDB")
public class EmpleadoServiceDB implements EmpleadoService{

    @Autowired
    private EmpleadoRepository repositorio;

    public EmpleadoServiceDB() {
        super();
        this.repositorio = null;
    }

    @Override
    public Empleado add(Empleado e) {
        return (Empleado) repositorio.save(e);
    }

    @Override
    public List<Empleado> findAll() {
        return repositorio.findAll();
    }

    @Override
    public Empleado findById(long id) {
        return (Empleado) repositorio.findById(id).orElse(null);
    }

    @Override
    public Empleado edit(Empleado e) {
        return (Empleado) repositorio.save(e);
    }
}
