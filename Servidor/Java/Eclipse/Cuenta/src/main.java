import Cuenta.Cuenta;
import Persona.Persona;

public class main {

	public static void main(String[] args) {
		
	/*
		Cuenta c = new Cuenta("Oscar", 100.0);
		Cuenta a = new Cuenta("Andres");
		c.retirar(100.0);
		System.out.println(c);
		c.ingresar(20.0);
		c.setTitular("Óscar C.");
		System.out.println(c);
		
		a.retirar(100000.0);
		System.out.println(a);
		a.ingresar(2000.0);
		a.setTitular("Andres C.");
		System.out.println(a);
	*/
		
		Persona p1 = new Persona();
		p1.setAltura(1.60);
		p1.setGenero('M');
		p1.setPeso(55.0);
		Persona p2 = new Persona("Oscar",22,'H',73.5,1.84);
		Persona p3 = new Persona("Andres",21,'M',120.0,1.70);
		Persona p4 = new Persona("Test",30,'M');
			
		System.out.println(p1.muestraMasa());
		System.out.println(p2.muestraMasa());
		System.out.println(p3.muestraMasa());
		System.out.println(p4.muestraMasa());
	}
}
