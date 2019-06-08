# Aplicaciones Web (Trabajo Practico 1)

## Estructura del proyecto
Como el proyecto contiene tambien la estructura completa de docker para poder correrlo, la misma quedo de la siguiente manera:

* El directorio ```apache_files``` esta mapeado al directorio de logs del contenedor, por lo que la finalidad del mismo es tener donde consultar los logs de apache principalmente.
* El directorio ```bdd_files``` contiene los archivos de MySQL para asegurar la persistencia de datos mas alla de los contenedores.
* El directorio ```build``` contiene el dockerfile y el archivo de virtualhosts de apache. Ambos necesarios para la construccion del contenedor de la aplicacion.
* El directorio ```app``` es el que contiene todos los archivos de la aplicacion, esta mapeado al directorio ```/var/www/html``` del contenedor de la aplicacion.
* El directorio ```doc``` tenemos la documentacion de la materia, comprendida por los archivos ```Clase-01-IntroWeb.pdf``` para la parte teorica y ```Enunciado.docx``` como el enunciado del problema resuelto en este trabajo.
* Entre los demas archivos que son externos a esas carpetas podemos encontrar el ```docker-compose.yml``` (que es de quien construimos el stack de desarrollo y prueba del programa).

## Resolucion

Para la resolucion de este trabajo se implemento tanto el cliente como el servidor en PHP puro, con algunas diferencias entre lo que es el backend y el frontend:

* El backend se implemento el PHP puro, modificando el header de los archivos que lo componen para que la devolucion sea de documentos JSON. Los archivos se encuentran dentro de la carpeta ```app/funcionalidad``` y subsecuentemente se separan por funcinalidad requerida (carrito, catalogo y perfil).
* Dentro de la carpeta ```app/static``` podemos encontrar los archivos estaticos de nuestra aplicacion. Mas alla de los propios utilizados, se utilizo tambien bootstrap para la visual del sistema y jQuery tanto para la visual del sistema como para la comunicacion entre el frontend y el backend (Mediante ajax).
* Todos los archivos que estan fuera de esas carpeta corresponden al frontend y estan escritos en html con php incrustado.

## Comunicacion entre Backend y Frontend
La comunicacion entre el frontend y el backend esta implementada mediante jQuery en la carpeta ```static/js```. Los nombres de los archivos se corresponden 1-1 con los nombres de los arhcivos del backend. 

Por ejemplo: Asi como tenemos en ```app/funcionalidad/carrito/agregar_al_carrito.php``` la funcionalidad del backend para agregar un producto dado al carrito, en ```static/js/agregar_al_carrito``` esta el codigo JavaScript necesario para realizar dicha comunicacion.

### Caso por caso
* Carrito:
    * Agregar un producto al Carrito: En el archivo ```app/funcionalidad/carrito/agregar_al_carrito.php``` se resuelve la funcionalidad necesaria para agregar un producto al carrito, recibiendo por GET el id del producto a agregar y verificando si el mismo tiene stock disponible. 
        > **NOTA:** En caso de que el producto ya exista en el carrito, se incrementa la cantidad pedida. Caso contrario, se agrega con cantidad pedida = 1.
    * Borrar un producto del Carrito: En el archivo ```app/funcionalidad/carrito/quitar_del_carrito.php``` se resuelve la funcionalidad de borrado de un producto en particular del carrito. Se reciben tres parametros por GET: El id del producto a eliminar, la posicion del mismo en el carrito y la cantidad del mismo a eliminar.
        > **Nota:** Al eliminar un producto del carrito, el stock del mismo es devuelto al stock del producto en el catalogo.
    * Realizar una Compra: En el archivo ```app/funcionalidad/carrito/comprar.php``` se resuelve la logica de la compra. Se recibe el precio final por parametro GET y se realiza tanto el impacto en la base de datos de la compra como la limpieza del carrito de la sesion del cliente.
    * Obtener el Carrito completo: En el archivo ```app/funcionalidad/carrito/get_carrito.php``` se resuelve dicha funcionalidad, simplemente devolviendo todos los productos del carrito en formato JSON. 
    * Eliminar todos los productos del Carrito: En el archivo ```app/funcionalidad/carrito/borrar_carrito.php``` se resuelve la funcionalidad del borrado completo del carrito, en donde se recorre el mismo y devuelve el stock al catalogo antes de quitarlo efectivamente del carrito. 
* Catalogo:
    * Obtener todos los articulos del Catalogo: En el archivo ```app/funcionalidad/catalogo/get_productos.php``` se le pide a la base de datos que nos de todos los productos del catalogo y se los devuelve sin mas (En formato JSON).
* Perfil:
    * Obtener todas las Compras del Cliente: En el archivo ```app/funcionalidad/perfil/get_compras.php``` se resuelve la funcionalidad de la obtencion de todas las compras del cliente logueado. El id del usuario se obtiene de la sesion y se devuelven las mismas en formato JSON.
    * Obtener todos los detalles de una Compra: En el archivo ```app/funcionalidad/perfil/get_detalles.php```, dado un id de compra (Recibido por parametro en el GET), se devuelven todos los detalles de dicha compra.


## Con respecto al carrito
El carrito de la aplicacion esta implementado mediante la sesion del usuario. Teniendo la bondad de que la sesion esta guardada el el servidor y PHP la maneja facilmente, el carrito se agrega a la misma y se modifica en la misma, por lo que solo quedan los productos, los usuarios y las compras en si para la persistencia de datos.

## Persistencia de datos
La persistencia de datos se implemento en un script de precarga a la base que se encuentra en ```app/bdd.sql```.

La base de datos tiene 4 tablas implementadas:
* Usuarios: En donde se almacenan los usuarios registrados en la tienda. Se relaciona con la tabla de compras. La misma queda especificada por:
    ```sql
    create table usuarios (
        id int(10) primary key auto_increment,
        nombre varchar(191),
        clave varchar(191),
        email varchar(191)
    );
    ```
* Productos: En donde se guardan los productos en venta. Se relaciona con la tabla de detalles de compras (Aun asi, el precio del producto se impacta en el detalle de la compra para mantener el historico). La misma queda especificada por:
    ```sql
    create table productos (
        id int(10) primary key auto_increment,
        nombre varchar(191),
        autor varchar(191),
        editorial varchar(191),
        descripcion text,
        stock int(10),
        precio double
    );
    ```
* Compras: En donde se encuentran las compras realizadas. Se relaciona con la tabla de detalles y con la de usuarios. La misma queda especificada por:
    ```sql
    create table compras (
        id int(10) primary key auto_increment,
        id_usuario int(10),
        fecha datetime,
        precio_final double
    );
    ALTER TABLE compras ADD CONSTRAINT fk_usuario_id FOREIGN KEY (id_usuario) REFERENCES usuarios (id);
    ```
* Detalles Compras: En donde se guardan los detalles de cada compra. Se relaciona con las tablas de compras y de productos. La misma queda especificada por:
    ```sql
    create table detalles_compras (
        id int(10) primary key auto_increment,
        id_compra int(10),
        id_producto int(10),
        cantidad int(10),
        precio_unitario double
    );
    ALTER TABLE detalles_compras ADD CONSTRAINT fk_compra_id FOREIGN KEY (id_compra) REFERENCES compras (id);
    ALTER TABLE detalles_compras ADD CONSTRAINT fk_producto_id FOREIGN KEY (id_producto) REFERENCES productos (id);
    ```