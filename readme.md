# Madrid Integrate

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalación

Preparar el ambiente de instalación para el framework 5.4, por facilidad usar [Homestead](https://laravel.com/docs/5.4/homestead) y seguir el proceso de instalación o containers de Docker.

Posicionese sobre la raíz del proyecto y ejecute los siguientes comandos:

1. Instalar los archivos y librerías de php:
~~~
composer install
~~~

2. Copiar el archivo .env.example a .env, y verificar que los accesos de conexión a la base de datos y demás datos están correctos.
~~~
cp .env.example .env
~~~

3. Migrar la base de datos:
~~~
php artisan migrate
~~~

> Si está usando Vagrant, ir a la sección correspondiente.

4. Para ejecutar los unit tests ejecutar:
~~~
php artisan dusk
~~~

### Vagrant
En caso de que esté usando Vagrant ejecutar:
~~~
php artisan key:generate
npm rebuild node-sass --no-bin-links
npm install --no-bin-links
npm install datatables.net --only=dev --no-bin-links --no-optional --save-dev
Xvfb -ac :0 -screen 0 1280x1024x16 &
~~~

Agregar en el archivo C:\Windows\System32\drivers\etc\hosts la siguiente linea, la cual corresponde a la dirección ip de la máquina virtual.
~~~
192.168.10.10  homestead.app
~~~