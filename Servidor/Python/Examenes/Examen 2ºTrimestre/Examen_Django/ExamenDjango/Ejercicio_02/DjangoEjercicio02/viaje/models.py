from django.db import models

# Create your models here.
    
class Pais(models.Model):
    nombre = models.CharField(blank="false",max_length=200)
    slug = models.SlugField(blank="false")
    poblacion = models.IntegerField(blank="false")

    class Meta:
        verbose_name_plural = "paises"

    def __str__(self):
        return self.nombre

class Ciudad(models.Model):
    nombre = models.CharField(blank="false",max_length=100)
    slug = models.SlugField(blank="false")
    foto = models.FileField(blank="false",upload_to='fotos/')
    description = models.TextField(blank="false")
    activa = models.BooleanField(default=True)
    
    class Meta:
        verbose_name_plural = "ciudades"
    
    def __str__(self):
        return self.nombre

    pais = models.ForeignKey("Pais", on_delete=models.CASCADE)