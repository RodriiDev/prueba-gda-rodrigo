# Prueba GDA Rodrigo Soto Rojas

En este repositorio se encuentra una prueba técnica realizada con laravel

## Comenzando 🚀

_Primeramente para probar el proyecto se puede desacargar directamente aquí o si tienes instalado git puedes hacer un git clone https://github.com/RodriiDev/prueba-gda-rodrigo.git._

## Instalación y Configuración 📋

_Que cosas necesitas instalar_

```
PHP
Laravel 9
Un gestor para MySql (Myql Workbench puede ser)
```

_Despues de tener esto instalado:_

_Primero necesitamos tener nuestra base de datos, para eso en nuestro proyecto tenemos un archivo llamado prueba-gda.sql_

_Ese archivo lo abrimos con el MySQL Workbench o con cualquier gestor de MySQL y lo corremos_

_Para hacer nuestra conexión con nuestra base de datos configuramos nuestro archivo .env que viene en el proyecto de laravel_
_Un ejemplo de la configuracipon es la siguiente (lo que puede variar el username y password, ponemos los que tengamos en nuestro gestor)_

...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydb
DB_USERNAME=root
DB_PASSWORD=root
...

_Ya que tengas laravel instalado y nuestra base de datos, abrimos una terminal y nos colocamos en la carpeta del proyecto y corremos el servidor con el siguiente comando:_

```
php artisan serve
```

_Y damos click en la url que nos dio para que se nos abra la aplicación en el navegador_



