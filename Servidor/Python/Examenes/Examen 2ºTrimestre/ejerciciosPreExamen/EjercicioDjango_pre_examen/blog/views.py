from django.shortcuts import render
from blog.models import Departamento, Centro

# Create your views here.
def home(request):
	centros = Centro.objects.all()
	return render(request, 'home.html', {
        'centros': centros,
    })

def centro(request):
	centros = Centro.objects.all()
	return render(request, 'home.html', {
        'centros': centros,
    })

def departamento(request, slugCentro):
	departamentos = Departamento.objects.filter(centro__slug=slugCentro)
	centro = Centro.objects.get(slug=slugCentro)
	return render(request, 'departamentos.html', {
        'centro': centro,
        'departamentos': departamentos,
    })