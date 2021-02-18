from django.db import models

# Create your models here.

class Centro(models.Model):
    nombre = models.CharField(blank="false",max_length=100)
    direccion = models.CharField(blank="false",max_length=30)
    slug = models.SlugField()

class Departamento(models.Model):
    nombre = models.CharField(max_length=200)
    preupuesto = models.IntegerField()
    slug = models.SlugField()
    centro = models.ForeignKey("Centro", on_delete=models.CASCADE)

