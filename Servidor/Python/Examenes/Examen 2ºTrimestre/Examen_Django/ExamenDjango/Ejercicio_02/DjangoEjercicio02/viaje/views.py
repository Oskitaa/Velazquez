from django.shortcuts import render
from .models import Pais,Ciudad


# Create your views here.

def home(request):
    ciudad = Ciudad.objects.first()
    pais = Pais.objects.all()

    return render(request, 'viaje/home.html', {
        'ciudad': ciudad,
        'paises': pais,

})

def pais(request,slug):
    pais = Pais.objects.get(slug=slug)
    ciudades = Ciudad.objects.filter(pais__slug=slug)
    paises = Pais.objects.all()

    return render(request,'viaje/pais.html',{
        'pais' : pais,
        'ciudades' : ciudades,
        'paises' : paises
    })
    
def busqueda(request):

    paises = Pais.objects.all()
    query = request.GET.get('buscar','')
    
    if query:
        ciudades = Ciudad.objects.filter(activa=True).filter(description__icontains=query)
    else:
        ciudades = []

    return render(request, 'viaje/busqueda.html', {
        'paises' : paises,
        'ciudades' : ciudades,
        'query' : query,
        
    }) 