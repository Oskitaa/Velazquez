package dwes.java.spring.proyecto.controllers;

import java.util.Arrays;
import java.util.Collection;
import java.util.HashMap;
import java.util.Map;
import java.util.Optional;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class IndexController {

	
		
	@GetMapping("/")
	//@RequestMapping(value = "/")
	public String test(Model model,@RequestParam Optional<String> name){
		model.addAttribute("msg", name.orElse(null));
		return "index";
	}
	
	//@RequestMapping(value = "/test")
	@GetMapping("/test/{param}/{param2}")
	
	public String test2(@PathVariable String param,@PathVariable String param2){
		return "index";
	}
	
	@GetMapping("/query")
	public String query(Model model,@RequestParam String name,@RequestParam String name2){
		model.addAllAttributes(Arrays.asList(name,name2));
		return "index";
	}
}
