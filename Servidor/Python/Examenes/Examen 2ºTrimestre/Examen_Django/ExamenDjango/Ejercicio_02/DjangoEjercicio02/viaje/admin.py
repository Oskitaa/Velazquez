from django.contrib import admin
from .models import Ciudad,Pais

# Register your models here.

class CiudadAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("nombre",)}

class PaisAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("nombre",)}
    list_display = ('nombre', 'poblacion')
 
admin.site.register(Ciudad, CiudadAdmin)
admin.site.register(Pais, PaisAdmin)

