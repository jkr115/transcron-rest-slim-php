# TRANSCRON - API REST CON SLIM (PHP) 🐘

Principales tecnologías utilizadas: `PHP 7, Slim 3, MariaDB 10.5.8 y dotenv.`

## :gear: INSTALACIÓN

### Pre requisitos

- Git.
- Composer.
- PHP 7.3+.
- MySQL/MariaDB.

### Paso a paso

#### Paso 1

Clone el repositorio e instale las dependecias de slim y dotenv con composer.

```bash
git clone https://github.com/jkr115/transcron-rest-slim-php.git && cd transcron-rest-slim-php
composer install
```
#### Paso 2

Cree la base de datos y el usuario para la aplicación.
Si cambia las credenciales recuerde también hacerlo en el archivo .env.

```bash
mysql> CREATE DATABASE `transcron`;
mysql> CREATE USER 'transcron' IDENTIFIED BY 'tr4nscr0n';
mysql> GRANT USAGE ON transcron.* TO 'transcron'@localhost;
```
#### Paso 3

Importe el script sql ubicado en el directorio database.

```bash
cd database
mysql -u transcron  -p  transcron  < database.sql
Enter password:
```
Ingrese la contraseña del usuario creado anteriormente.

## :books: DOCUMENTACIÓN

### BASE DE DATOS

Diagrama entidad relación:

![Diagrama entidad relación](https://github.com/jkr115/transcron-rest-slim-php/blob/main/database/transcron-er-diagram.png)

### ENDPOINTS

*Empresa*
Método HTTP | URL 
--- | --- 
GET | `/transcron/public/api/empresa` 
GET | `/transcron/public/api/empresa/{id}` 
POST | `/transcron/public/api/empresa/nuevo` 
PUT | `/transcron/public/api/empresa/modificar/{id}` 
DELETE | `/transcron/public/api/empresa/eliminar/{id}`

*Representante Legal*
Método HTTP | URL 
--- | --- 
GET | `/transcron/public/api/representante` 
GET | `/transcron/public/api/representante/{id}` 
POST | `/transcron/public/api/representante/nuevo` 
PUT | `/transcron/public/api/representante/modificar/{id}` 
DELETE | `/transcron/public/api/representante/eliminar/{id}` 

*Vehículo*
Método HTTP | URL 
--- | --- 
GET | `/transcron/public/api/vehiculo` 
GET | `/transcron/public/api/vehiculo/{id}` 
POST | `/transcron/public/api/vehiculo/nuevo` 
PUT | `/transcron/public/api/vehiculo/modificar/{id}` 
DELETE | `/transcron/public/api/vehiculo/eliminar/{id}` 

*Conductor*
Método HTTP | URL 
--- | --- 
GET | `/transcron/public/api/conductor` 
GET | `/transcron/public/api/conductor/{id}` 
POST | `/transcron/public/api/conductor/nuevo` 
PUT | `/transcron/public/api/conductor/modificar/{id}` 
DELETE | `/transcron/public/api/conductor/eliminar/{id}` 

*Vinculación*
Método HTTP | URL 
--- | --- 
GET | `/transcron/public/api/vinculacion` 
GET | `/transcron/public/api/vinculacion/{id}` 
POST | `/transcron/public/api/vinculacion/nuevo` 
PUT | `/transcron/public/api/vinculacion/modificar/{id}` 
DELETE | `/transcron/public/api/vinculacion/eliminar/{id}`

*Vehículos con su empresa, representante legal y número de conductores. Sólo se obtienen los vehículos que tienen más de 2 conductores vinculados*
Método HTTP | URL 
--- | --- 
GET | `/transcron/public/api/vehiculogeneral` 

## :inbox_tray: DESCARGUE EL CLIENTE JAVA REST

Descargue el [ejecutable .jar y el archivo .properties](https://github.com/jkr115/transcron-java-rest-client/releases/tag/0.1)  y ubíquelos en un mismo directorio. Si necesita cambiar la url base del servidor edite el archivo config.properties y ejecute:

```bash
java -jar transcron-rest-client.jar
```

Visite el repositorio para ver el código fuente:

- [TRANSCRON - REST CLIENT (JAVA) ☕](https://github.com/jkr115/transcron-java-rest-client)

