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
Para la solucion de este trabajo se utilizo el framework Laravel (PHP 7.3) en su version 5.8, comunicado con una base de datos MySQL en su version 5.7. A su vez, para resolver el frontend se utilizo la libreria Vue.js (Aprovechando su integracion nativa con laravel), que se comunica con el backend mediante la capa de controladores web en lugar de la capa API.

## Diseño de la Solución
El problema fue modelado en base a dos clases principales (Relacionadas por una composicion):
* Tramite: La clase padre de cada tramite.
* Componente (Abstracta): La clase padre de cada componente implementado dentro del sistema.

Es decir, **Un tramite esta compuesto por componentes**.

Luego, la clase componente tiene clases hijas que la extienden y definen. Esto ultimo hace al sistema considerablemente extensible, ya que con solo extender del Componente, el sistema ya contaria con un tipo de componente nuevo (Solo habria que implementar el componente de Vue.js para que el mismo sepa como dibujarse en el frontend). Los componentes basicos con los que desarrollamos el sistema son:
* Texto: Que solo tiene un titulo y un contenido.
* Lista: Que tiene un titulo, una descripcion y una coleccion de Items (Modelados mediante una composicion tambien) que tienen en si mismos el contenido de cada item de la lista.
* Hipervinculo: Que solo tiene un titulo y una coleccion de LinkItems (Mediante una relacion de composicion) que son quienes contienen en si mismos cada URL de cada recurso con su correspondiente descripcion que queremos que se vea en el frontend.
* Adjunto: Que tiene un titulo y una coleccion de ArchivosAdjuntos (Mediante una relacion composicion) que tienen en si mismos un tipo de archivo (Simplemente para mostrar el icono en el frontend) y un path a la carpeta en donde se encuentran en el backend.

### Diagramas (En construccion!)
[Diagrama de Clases](doc/Clases.png)

[Diagrama Entidad Relacion](doc/DER.png)

## Testing

[URL de publicacion](http://www.google.com.ar)

[Datos Lighthouse](doc/Lighthouse.png)