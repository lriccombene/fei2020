# fei2020
materia de framework e Interoperabilidad
Paso a Paso como hacer que funcione este proyecto

Softeware Libre
Tecnologias requeridas son 
Docker-compose
Mysql
Php
Yii2
S.o Cualquiera de software libre "en este caso lo voy armar con Ubuntu 18 distribucion MATE"

Como instalar docker-compose
referencia : https://www.hostinger.com.ar/tutoriales/instalar-docker-compose-ubuntu/
sudo apt-get update
sudo apt-get upgrade
2. Crea un nuevo protocolo de repositorio
sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
3. Importa el comando con Curl
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
4. Instala la edición comunidad
sudo apt-get install docker-ce
5. Verifica la instalación
sudo systemctl status docker


-Una vez instalado el docker-compose
-descarga del repo de la rama master el codigo
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

listo bola ya tendrias que tener tu docker corriendo con todo lo necesario para empezar.

Atento........ 
Por la dudas que no podes correr algun migrate  para tu facilidad te dejamos un archivo yii.sh 
que te permite de forma mas rapida ejecutar el comando 
docker-compose exec app yii $@  
$@ es un parametro para cuando lo ejecutes
te dejo aqui un ejemplo
sudo bin/yii.sh migrate/create create_localidad_table --fields="nombre:string:notNull,descripcion:string"

En la carpeta comandos migrate insert dejo todos los archivos para crear las tablas y los insert para probar la api ;) 
asi cuando arranques con el sistema ya tenes ejemplo de prueba no los insert no son obligatorios para el funcionanmiento del sistema

Por las dudas si te fallo algo con los migrate o no pudiste terminar el proceso , te dejo el archivo fei2020.sql que con el podesde restaurar la base y tenes todas las tablas  


Tema usuario aplicacion web aqui dejo un usario con permisos para ver todas las opcion de menu usu Lucas clave lucas














