package dwes.java.conexion;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;

public class conexion2 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		andresCabron("ioPuta");
		HashMap<Integer, String> a = new HashMap<>();
		
		a.put(1,"tonto1");
		a.put(3,"tonto2");
		a.put(2,"tonto3");
		a.put(4,"tonto4");
		System.out.println(a.get(1));
	}
	
	public static void andresCabron(String mensaje) {
		ArrayList<String> aM = new ArrayList<>();
		 for (int i = 0; i < 10; i++) {
			aM.add(mensaje);
		}
		 for (String a : aM) {
			 System.out.println(a);
		}
	}

}
