# Catálogo Laravel

Proyecto de catálogo de productos desarrollado con Laravel como práctica académica.

## Requisitos previos

Para ejecutar este proyecto es necesario tener instalado:

- PHP >= 8.1
- Composer
- Laravel 10
- MySQL
- Servidor local (XAMPP, WAMP o Laragon)
- Git (opcional, para clonar el repositorio)

## Instalación y ejecución

Siga los siguientes pasos para instalar y ejecutar el proyecto:

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/Joshue-Jota/catalogo-laravel.git
2. **Acceder a la carpeta del proyecto**
cd catalogo-laravel
3. **Instalar dependencias**
composer install
Este comando descargará todas las dependencias necesarias definidas en el archivo composer.json.
4. **opiar el archivo de entorno**
cp .env.example .env
Este archivo contiene la configuración general del sistema y los datos de conexión a la base de datos.
5. **Generar la clave de la aplicación**
bash
php artisan key:generate
Este paso es necesario para el correcto funcionamiento del cifrado y las sesiones en Laravel.

6. **Configurar la base de datos**
Editar el archivo .env y configurar los siguientes datos:

text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
Luego crear la base de datos en MySQL con el mismo nombre indicado.

7. **Ejecutar migraciones**
bash
php artisan migrate
Este comando creará las tablas necesarias en la base de datos.