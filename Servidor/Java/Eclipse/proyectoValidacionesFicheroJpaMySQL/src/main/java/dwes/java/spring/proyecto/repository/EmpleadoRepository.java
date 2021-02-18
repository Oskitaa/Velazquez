package dwes.java.spring.proyecto.repository;

import org.springframework.data.domain.Example;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.domain.Sort;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface EmpleadoRepository extends JpaRepository {

    @Override
    List findAll();

    @Override
    List findAll(Sort sort);

    @Override
    List findAllById(Iterable iterable);

    @Override
    List saveAll(Iterable entities);

    @Override
    void flush();

    @Override
    Object saveAndFlush(Object entity);

    @Override
    void deleteInBatch(Iterable entities);

    @Override
    void deleteAllInBatch();

    @Override
    Object getOne(Object o);

    @Override
    List findAll(Example example);

    @Override
    List findAll(Example example, Sort sort);

    @Override
    Page findAll(Pageable pageable);

    @Override
    Object save(Object entity);

    @Override
    Optional findById(Object o);

    @Override
    boolean existsById(Object o);

    @Override
    long count();

    @Override
    void deleteById(Object o);

    @Override
    void delete(Object entity);

    @Override
    void deleteAll(Iterable entities);

    @Override
    void deleteAll();

    @Override
    Optional findOne(Example example);

    @Override
    Page findAll(Example example, Pageable pageable);

    @Override
    long count(Example example);

    @Override
    boolean exists(Example example);
}
