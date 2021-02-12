package dwes.java.spring.proyecto.controllers;

import java.util.Arrays;
import java.util.Collection;
import java.util.HashMap;
import java.util.Map;
import java.util.Optional;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import dwes.java.spring.proyecto.models.Empleado;
import dwes.java.spring.proyecto.services.EmpleadoService;

@Controller
public class IndexController {
	
	@Autowired
	private EmpleadoService servicio;
	
	@GetMapping({"/","empleados/listado"})
	public String listado(Model model){
		model.addAttribute("empleados", servicio.findAll());
		return "index";
	}
	
	@GetMapping("empleados/new")
	public String newEmpleadoForm(Model model){
		model.addAttribute("empleadoForm",new Empleado() );
		return "empleForm";
	}
	
	@PostMapping("empleados/new")
	public String newEmpleado(@Valid @ModelAttribute("empleadoForm") Empleado nuevoEmpleado, BindingResult bindingResult){
		if(bindingResult.hasErrors()) {
			return "empleForm";
		}
		servicio.add(nuevoEmpleado);
		return "redirect:/";
	}
	
	@GetMapping("empleados/editEmp/{id}")
	public String editEmpForm(Model model,@PathVariable Long id){
		model.addAttribute("empEditInfo",servicio.findById(id));
		return "empleForm";
	}
	
	@PostMapping("empleados/editEmp")
	public String editEmp(@ModelAttribute("empleadoForm") Empleado empEdit){
		servicio.edit(empEdit);
		return "redirect:/";
	}
	
	@PostMapping("empleados/deleteEmp/{id}")
	public String deleteEmp(Model model,@PathVariable Long id){
		servicio.delete(id);
		return "redirect:/";
	}
	
}
