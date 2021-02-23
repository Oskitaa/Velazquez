package dwes.java.spring.proyecto.repository;

import dwes.java.spring.proyecto.models.Empleado;
import org.springframework.data.domain.Example;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.domain.Sort;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface EmpleadoRepository extends JpaRepository<Empleado, Long> {

    @Override
    <S extends Empleado> S save(S entity);

    @Override
    Optional<Empleado> findById(Long aLong);

    @Override
    boolean existsById(Long aLong);

    @Override
    long count();

    @Override
    void deleteById(Long aLong);

    @Override
    void delete(Empleado entity);

    @Override
    void deleteAll(Iterable<? extends Empleado> entities);

    @Override
    void deleteAll();
}
