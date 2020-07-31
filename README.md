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
7. Git

Paso a Paso como hacer que funcione este proyecto

1.Instalar Docker y Docker-compose 

Referencia : https://www.digitalocean.com/community/tutorials/como-instalar-y-usar-docker-en-ubuntu-18-04-1-es
Referencia 2 :https://docs.docker.com/compose/install/

2. clono del repo el proyecto

git clone https://github.com/lriccombene/fei2020.git


3.Creo mi Docker Yml de en base a dist.yml pre existente

-Ubica el archivo docker-compose.dist.yml  cambiale el nombre a docker-compose.yml

    a. cp docker-compose.dist.yml docker-compose.yml
    
    b. actualiza las variables de entorno de docker-compose.yml si fuera necesario 
    

3. Ejecuta el comando docker-compose up -d  para levantar los contenedores.

    -como es la primera vez que lo ejecutas va tardar no te preocupes espera un momento

4.ejecuta este archivo bash que se encuentra en la carpeta bin del proyecto

    a. bash bin/start-project.sh
    
    b. bash bin/first-start.sh
    
    
5. ejecuta las migraciones

    a.   ./bin/yii.sh migrate/up
    
6. Crear usuario con permisos de administracion

    a. ingresar al sitio al formulario usuario http://localhost:8000/usuario
    
    b. crear un usuario 
    
    c. hacer click en nuevo usuario  luego completar el formulario con los datos : en nombre =admin, nombre de usuario =admin , clave =admin

7. Empezar a usar la aplicacion

    a. http://localhost:8000

8. Acceder phpmyadmin
    a. http://localhost:8001









