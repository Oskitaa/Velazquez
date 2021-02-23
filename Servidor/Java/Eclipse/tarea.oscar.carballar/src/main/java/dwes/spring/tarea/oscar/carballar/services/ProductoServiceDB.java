package dwes.spring.tarea.oscar.carballar.services;

import dwes.spring.tarea.oscar.carballar.models.Producto;
import dwes.spring.tarea.oscar.carballar.repository.ProductoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Service;

import java.util.List;


@Primary
@Service("ProductoServiceDB")
public class ProductoServiceDB implements ProductoService{

    @Autowired
    private ProductoRepository repositorio;

    public ProductoServiceDB() {
        super();
        this.repositorio = null;
    }

    @Override
    public Producto add(Producto e) {
        return (Producto) repositorio.save(e);
    }

    @Override
    public List<Producto> findAll() {
        return repositorio.findAll();
    }

    @Override
    public Producto findById(long id) {
        return (Producto) repositorio.findById(id).orElse(null);
    }

    @Override
    public Producto edit(Producto e) {
        return (Producto) repositorio.save(e);
    }

    @Override
    public void deleteById(long id) {
        repositorio.deleteById(id);
    }
}
