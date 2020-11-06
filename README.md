### Ejemplos de PHPUnit con Laravel
Los ejemplos se encuentran en `tests/Feature/*.php`
otros archivos utilizados: 
* app/Bag.php
* app/Http/Controllers/Hola.php
* routes/web.php
* resources/views/beta.blade.php
* resources/views/hello_world.blade.php
lo demás es propio de laravel (intentar un ejemplo más liviano)

Para ejecutar se debe instalar el entorno primero
`$ composer install`

Las pruebas se ejecutan con
`$ phpunit --testdox`

Si se desea una prueba en particular, escribir la ruta completa a la misma
`$ phpunit --testdox tests/Feature/BagTest.php`
