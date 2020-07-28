# fei2020
Materia Trabajo Final 2020

Es un sistema de Gestion de expediente de la Secretaria de Ambiente Desarrollo Sustentable y Cambio Climatico. La idea es que funcione como una mesa de entrada, como tambien de seguiento de datos tecnicos. Es un software que lo utilizaran Administrativos como Profesionales.


Softeware Libre Tecnologias requeridas
1.Docker
2.Docker-compose
3.Mysql
4.Php 7.x
5.Yii2
6. S.o Cualquiera de software libre "en este caso lo voy armar con Ubuntu 18 distribucion MATE"

Paso a Paso como hacer que funcione este proyecto

1.Instalar Docker y Docker-compose 
Referencia : https://www.digitalocean.com/community/tutorials/como-instalar-y-usar-docker-en-ubuntu-18-04-1-es


-Ubica el archivo docker-compose.dist.yml  cambiale el nombre a docker-compose.yml
-Ubicate en la carpeta del proyecto justo donde esta el archivo que recien modificaste su nombre

-y ejecuta con o permiso de administrador 
    sudo docker-compose up    

-como es la primera vez que lo ejecutas va tardar no te preocupes espera un momento
-luego de esto abri otra terminal
-y ejecuta este archivo bash 

    start-project.sh  "puede que requieras permisos de admin"

-aqui se va instalar composer dento del docker + yii2
-otra manera es entrando dentro del docker con 
    
    docker-compose exec app bash 

-y ejecutar aqui dentro las dos lineas de bash 
    
    composer global require "fxp/composer-asset-plugin:^1.4.1"
    composer create-project --prefer-dist yiisoft/yii2-app-basic basic

esto va atardar un rato dado que descarga yii2 crea las carpetas .....

Una vez que ya instalaste yii2 y composer ahora tenes que dar permisos algunas carpetas con el segundo bash
first-start.sh

listo ya tendrias que tener tu docker corriendo con todo lo necesario para empezar.

Atento........ 

luego de esto clona del repositorio el proyecto, dado que en el github no estan todos los archivos por una cuestion de que pensan mucho.

en el caso que no logres que funcione, lo importante es lograr que corra yii2 , y luego copia al proyecto las carpetas models,controllers, views, modules, web, config. 



Tema MIGRATE y insert  

Por la dudas que no podes correr algun migrate  para tu facilidad te dejamos un archivo yii.sh 
que te permite de forma mas rapida ejecutar el comando 

docker-compose exec app yii $@  

$@ es un parametro para cuando lo ejecutes
te dejo aqui un ejemplo

sudo bin/yii.sh migrate/create create_localidad_table --fields="nombre:string:notNull,descripcion:string"

En la carpeta comandos migrate insert dejo todos los archivos para crear las tablas y los insert para probar la api ;) 
asi cuando arranques con el sistema ya tenes ejemplo de prueba no los insert no son obligatorios para el funcionanmiento del sistema

Por las dudas si te fallo algo con los migrate o no pudiste terminar el proceso , te dejo el archivo fei2020.sql que con el podesde restaurar la base y tenes todas las tablas  


Usuario ......
Tema usuario aplicacion web aqui dejo un usario con permisos para ver todas las opcion de menu usu Lucas clave lucas y con el usuario juan clave juan solo algunas tablas


Por las dudas tene encuenta esto 
la aplicacion esta configurada para que corra en el puerto 8000 y en el 8001 phpmyadmin


Para ingresar por primera vez a la aplicacion hace lo siguiente
abri tu navegador  y coloca lo siguiente
localhost:8000/













