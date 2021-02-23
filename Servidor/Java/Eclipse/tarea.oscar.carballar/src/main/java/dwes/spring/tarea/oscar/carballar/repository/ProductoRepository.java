package dwes.spring.tarea.oscar.carballar.repository;

import dwes.spring.tarea.oscar.carballar.models.Producto;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface ProductoRepository extends JpaRepository<Producto, Long> {
    @Override
    <S extends Producto> S save(S entity);

    @Override
    Optional<Producto> findById(Long aLong);

    @Override
    List<Producto> findAll();

    @Override
    boolean existsById(Long aLong);

    @Override
    long count();

    @Override
    void deleteById(Long aLong);

    @Override
    void delete(Producto entity);

    @Override
    void deleteAll(Iterable<? extends Producto> entities);

    @Override
    void deleteAll();

    List<Producto> findByNombreContainsIgnoreCaseOrDescripcionContainsIgnoreCase(String name, String description);

}
