package dwes.spring.tarea.oscar.carballar.controllers;

import dwes.spring.tarea.oscar.carballar.models.Producto;
import dwes.spring.tarea.oscar.carballar.repository.ProductoRepository;
import dwes.spring.tarea.oscar.carballar.services.ProductoServiceDB;
import dwes.spring.tarea.oscar.carballar.upload.storage.StorageService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.Resource;
import org.springframework.http.ResponseEntity;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.web.authentication.logout.SecurityContextLogoutHandler;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.method.annotation.MvcUriComponentsBuilder;


import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.validation.Valid;
import java.util.Date;
import java.util.List;

@Controller
public class ProductoController {

    @Autowired
    private ProductoServiceDB servicio;

    @Autowired
    private StorageService storageService;

    @Autowired
    private ProductoRepository ProductoRepository;

    @RequestMapping(value="/logout", method = RequestMethod.GET)
    public String logoutPage (HttpServletRequest request, HttpServletResponse response) {
        Authentication auth = SecurityContextHolder.getContext().getAuthentication();
        if (auth != null){
            new SecurityContextLogoutHandler().logout(request, response, auth);
        }
        return "redirect:/";
    }

    @GetMapping({"/", "producto"})
    public String listado(Model model,@RequestParam(name="q", required=false) String query){

        List<Producto> listadoProductos = (query == null) ? servicio.findAll() : ProductoRepository.findByNombreContainsIgnoreCaseOrDescripcionContainsIgnoreCase(query,query);
        model.addAttribute("listaProductos",listadoProductos);
        return "listado";
    }

    @GetMapping("/producto/new")
    public String nuevoProductoForm(Model model) {
        model.addAttribute("productoForm", new Producto());
        return "formulario";
    }

    @PostMapping("/producto/new/submit")
    public String nuevoProductoSubmit(@Valid @ModelAttribute("productoForm") Producto nuevoProdcuto,
                                      BindingResult bindingResult, @RequestParam("file") MultipartFile file) {
        if (bindingResult.hasErrors()) {
            return "formulario";
        } else {
            if (!file.isEmpty()) {
                String avatar = storageService.store(file, new Date().getTime());
                nuevoProdcuto.setImagen(MvcUriComponentsBuilder.fromMethodName(ProductoController.class, "serveFile", avatar).build().toUriString());
            }
            servicio.add(nuevoProdcuto);
            return "redirect:/";
        }
    }

    @GetMapping("/producto/edit/{id}")
    public String editarProductoForm(@PathVariable long id, Model model) {
        Producto producto = servicio.findById(id);
        if (producto!=null) {
            model.addAttribute("productoForm", producto);
            return "formulario";
        }else {
            return "redirect:/producto/new";
        }
    }

    @PostMapping("/producto/edit/submit")
    public String editarProductoSubmit(@Valid @ModelAttribute("productoForm") Producto producto, BindingResult bindingResult,
                                       @RequestParam("file") MultipartFile file) {

        if (bindingResult.hasErrors()) {
            return "formulario";
        } else {
            if (!file.isEmpty()) {
                String avatar = storageService.store(file, new Date().getTime());
                producto.setImagen(MvcUriComponentsBuilder.fromMethodName(ProductoController.class, "serveFile", avatar).build().toUriString());
            } else{
                producto.setImagen(servicio.findById(producto.getId()).getImagen());
            }
            servicio.edit(producto);
            return "redirect:/producto";
        }
    }

    @GetMapping("/producto/detail/{id}")
    public String detalleProductoForm(@PathVariable long id, Model model) {
        Producto producto = servicio.findById(id);
        if (producto!=null) {
            model.addAttribute("prodcutoDetalle", producto);
            return "detalle";
        }else {
            return "redirect:/producto";
        }
    }

    @PostMapping("/producto/borrar/{id}")
    public String borrarProducto(@PathVariable long id, Model model) {
            servicio.deleteById(id);
            return "redirect:/producto";
    }

    @PostMapping("/producto/{id}/comprar")
    public String comprarProducto(@PathVariable long id, Model model) {
        Producto producto = servicio.findById(id);
            if (producto.getUnidades() <= 0) {
                return "redirect:/producto";
            } else {
                producto.setImagen(producto.getImagen());
                producto.setUnidades(producto.getUnidades()-1);
                servicio.edit(producto);
                model.addAttribute("producto", producto);
                return "compra";
            }
        }

    @GetMapping("/403")
    public String error() {
        return "redirect:/login";
    }

    @GetMapping("/files/{filename:.+}")
    @ResponseBody
    public ResponseEntity<Resource> serveFile(@PathVariable String filename) {
        Resource file = storageService.loadAsResource(filename);
        return ResponseEntity.ok().body(file);
    }

}
