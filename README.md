<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

Docker version 20.10.10
docker-compose version 1.29.2



INSTALLATION
------------

### Install with Docker

Dentro de la carpeta api-desafio-possumus vamos a corremos el sieguiente comando (esto mismo crea volumen para la bd). Gracias al docker-compose desplegamos la aplicacion con su bases de datos estableciendo minimas configuraciones
		
	*Ambiente dev
		docker-compose -p app up -d 

	*Borramos los contenedores (borra los contenedores)

		docker-compose -p app down

Luego de desplegar los contenedor, procedemos a la creacion de la bases de datos con el siguiente comando. La bd se persiste en el volume de docker-compose llamado app_desafio-vol

    docker exec -i app_desafio_db_1 mysql -u root -proot --execute 'create database desafio DEFAULT CHARACTER SET utf8'
    
CONFIGURATION
-------------

### Database
Las configuraciones de bd se encuentran en `config/db.php`, aca mismo vamos a usar variables de entorno

**URl:**

