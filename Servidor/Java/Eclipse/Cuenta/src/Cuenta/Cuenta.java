package Cuenta;

public class Cuenta{
	
	private String titular;
	private Double cantidad;
	
	public Cuenta(String titular, Double cantidad) {
		this.setTitular(titular);
		this.cantidad=cantidad;
	}
	public Cuenta(String titular) {
		this.setTitular(titular);
		this.cantidad = 0.0;
	}

	public String getTitular() {
		return titular;
	}

	public void setTitular(String titular) {
		this.titular = titular;
	}

	public Double getCantidad() {
		return cantidad;
	}
	
	public void ingresar(Double cantidad) {
		this.cantidad += (cantidad < 0) ? 0 : cantidad;
	}
		
	public void retirar(Double cantidad) {
		this.cantidad -= (cantidad > this.getCantidad()) ? this.getCantidad() : cantidad;
	}

	@Override
	public String toString() {
		return "La cuenta del cabrón de " + titular + ", y es un mierda por que tiene " + cantidad + "€.";
	}
	
	
	
	}

