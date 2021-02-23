package dwes.java.spring.proyecto.repositorios;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import dwes.java.spring.proyecto.models.Empleado;

public interface EmpleadoRepository extends JpaRepository<Empleado, Long> {

	List<Empleado> findByNombreContainsIgnoreCaseOrEmailContainsIgnoreCaseOrTelefonoContainsIgnoreCase(String nombre, String email, String telefono);

	@Query("select e from Empleado e where lower(e.nombre) like %?1% or lower(e.email) like %?1% or lower(e.telefono) like %?1%")
	List<Empleado> encuentraPorNombreEmailOTelefono(String cadena);
	
}
