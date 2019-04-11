# Dockerized Laravel #

On this repository you'll find everything you need to start a Laravel app.
It contains the project folders, the docker-compose file and the app folder (where
you'll put your app).
The folders are for the following:

* app: Here's where you'll install your application.
* apache_files: Docker-compose automatically maps this folder to the container's one containing apache's logs.
* bdd_files: Docker-compose automatically maps this folder to the database container's one containing the database files (So that persistency is ensured).
* build: Where you can find not only the dockerfile of the application's image but also the virtualhosts files so that you can personalize it in any way from the build context.


# Setup #

1. Just run "docker-compose up --build -d" to start all containers and to build the application's image.

if you need to start a new laravel application, once you created the containers, log into the application one with "docker exec  -it laravel_app bash" and then:

1. Install a new laravel app with "composer create-project --prefer-dist laravel/laravel newapp"
2. Move all content to the apache's documentroot folder and clean the installer generated folder with "cp newapp/* . && rm -r newapp"
3. Write something great!