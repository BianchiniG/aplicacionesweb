# Aplicaciones Web (Trabajo Practico 2)

## Estructura del proyecto
Como el proyecto contiene tambien la estructura completa de docker para poder correrlo, la misma quedo de la siguiente manera:

* El directorio ```apache_files``` esta mapeado al directorio de logs del contenedor, por lo que la finalidad del mismo es tener donde consultar los logs de apache principalmente.
* El directorio ```bdd_files``` contiene los archivos de MySQL para asegurar la persistencia de datos mas alla de los contenedores.
* El directorio ```build``` contiene el dockerfile y el archivo de virtualhosts de apache. Ambos necesarios para la construccion del contenedor de la aplicacion.
* El directorio ```app``` es el que contiene todos los archivos de la aplicacion, esta mapeado al directorio ```/var/www/html``` del contenedor de la aplicacion.
* El directorio ```doc``` tenemos la documentacion de la materia, comprendida por los archivos ```Clase02.pdf``` para la parte teorica y ```Proyecto2-2019.docx``` como el enunciado del problema resuelto en este trabajo.
* Entre los demas archivos que son externos a esas carpetas podemos encontrar el ```docker-compose.yml``` (que es de quien construimos el stack de desarrollo y prueba del programa).

## Resolucion

