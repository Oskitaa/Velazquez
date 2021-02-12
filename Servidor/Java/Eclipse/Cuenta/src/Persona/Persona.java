package Persona;

public class Persona {
	
	private final static char H = 'H';
	private final static char M = 'M';
	
	private String nombre;
	private int edad;
	private char genero;
	private Double peso;
	private Double altura;
	
	
	public Persona() {
		this.nombre = "";
		this.edad = 0;
		this.genero = H;
		this.peso = 0.0;
		this.altura = 0.0;
	}
	
	public Persona(String nombre, int edad, char genero) {
		this.nombre = nombre;
		this.edad = edad;
		this.genero = comprobaGenero(genero);
		this.peso = 0.0;
		this.altura = 0.0;
	}
	
	public Persona(String nombre, int edad, char genero, Double peso, Double altura) {
		this.nombre = nombre;
		this.edad = edad;
		this.genero = comprobaGenero(genero);
		this.peso = peso;
		this.altura = altura;
	}
	
	/*
	 * calcularIMC(): calcula si la persona está en su peso ideal (peso en kg/(altura
	al cuadrado en metros): Si esta fórmula devuelve un valor menor que 20, la
	función devuelve un -1 (por debajo de su peso ideal), si devuelve un número
	entre 20 y 25 (incluidos) la función devuelve un 0, significa que está por en su
	peso ideal y si devuelve un valor mayor que 25 significa que tiene sobrepeso,
	la función devuelve un 1. Te recomiendo que uses constantes para devolver
	estos valores.*/
	
	public int calcularIMC() {
		Double p = this.getPeso()/Math.pow(this.altura, 2);
		return (p < 20) ? -1 : (p >=20 & p<=25) ? 0 : 1;
	}
	
	public String muestraMasa() {
		int i = calcularIMC();
		String msg = "";
		switch (i) {
			case -1:	
				msg="Anorexico";
				break;
			case 0:	
				msg="Normal";
				break;
			case 1:	
				msg="Gordoooo!!!";
				break;
		}
		return msg;
	}
	
	//esMayorDeEdad(): indica si es mayor de edad, devuelve un booleano.
	
	public boolean esMayorDeEdad() {
		return this.edad >= 18;
	}
	
	//comprobaGenero(char genero): comprueba que el género introducido es	correcto. Si no es correcto, será H.
	
	public char comprobaGenero(char genero) {
		return (genero == M) ? genero : H;
	}
	
	//toString(): devuelve toda la información del objeto.
	
	@Override
	public String toString() {
		return "Persona [nombre=" + nombre + ", edad=" + edad + ", genero=" + genero + ", peso=" + peso + ", altura="
				+ altura + "]";
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	public int getEdad() {
		return edad;
	}
	public void setEdad(int edad) {
		this.edad = edad;
	}
	public char getGenero() {
		return genero;
	}
	public void setGenero(char genero) {
		this.genero = genero;
	}
	public Double getPeso() {
		return peso;
	}
	public void setPeso(Double peso) {
		this.peso = peso;
	}
	public Double getAltura() {
		return altura;
	}
	public void setAltura(Double altura) {
		this.altura = altura;
	}
}