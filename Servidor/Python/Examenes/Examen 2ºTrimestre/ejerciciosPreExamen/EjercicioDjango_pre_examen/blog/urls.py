from django.contrib import admin
from django.urls import path
from blog import views

urlpatterns = [
    path('', views.home, name='home'),
    path('centros', views.centro, name='centro'),
    path('centro/<slug:slugCentro>', views.departamento, name='departamentos'),
]
