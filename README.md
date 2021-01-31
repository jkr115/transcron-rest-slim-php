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

## :inbox_tray: DESCARGUE EL CLIENTE JAVA REST

Descargue el [ejecutable .jar y el archivo .properties](https://github.com/jkr115/transcron-java-rest-client/releases/tag/0.1)  y ubíquelos en un mismo directorio. Si necesita cambiar la url base del servidor edite el archivo config.properties y ejecute:

```bash
java -jar transcron-rest-client.jar
```

Visite el repositorio para ver el código fuente:

- [TRANSCRON - REST CLIENT (JAVA) ☕](https://github.com/jkr115/transcron-java-rest-client)





