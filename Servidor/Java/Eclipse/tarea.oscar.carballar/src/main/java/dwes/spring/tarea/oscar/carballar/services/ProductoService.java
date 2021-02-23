package dwes.spring.tarea.oscar.carballar.services;

import dwes.spring.tarea.oscar.carballar.models.Producto;

import java.util.List;

public interface ProductoService {


    public Producto add(Producto e);
    public List<Producto> findAll();
    public Producto findById(long id);
    public  Producto edit(Producto e);
    public  void deleteById(long id);

}
