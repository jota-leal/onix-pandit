## OnixPandit

<p align="center">
    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/95.png" width="150">
</p>

Buscador de Pokémones desarrollado en Laravel por **Juan Leal**.

> La aplicación en funcionamiento se puede probar en [https://www.juanleal.com.ar/onix-pandit/](https://www.juanleal.com.ar/onix-pandit/).

## Instalación

Clonar el repositorio:

```shell
$ git clone https://github.com/jota-leal/onix-pandit.git
```

Ingresar al directorio del proyecto:

```shell
$ cd onix-pandit
```

Instalar paquetes requeridos:

```shell
$ composer install
```

Copiar el archivo de configuración:

```shell
# Unix o Mac
$ cp .env.example .env

# Windows
$ copy .env.example .env
```

Levantar la aplicación en `http://localhost:8000/`:

```shell
$ php artisan serve
```

## Ejecución de tests

Para ejecutar los tests:

```shell
$ php artisan test
```

---

## Detalles de los tests

## `testIndexUrl`

Comprueba que el código de estado de la aplicación sea `200`.

## `testSearchUrl`

Comprueba que el código de estado de la aplicación al ejecutar una búsqueda (ej.: `onix`) sea `200`.

## `testValidSearch`

Comprueba que en una **búsqueda válida** (ej.: `onix`) el código de estado devuelto sea `200` y además se encuentre el texto `Habilidades` (incluido en las tarjetas de resultado) y que **no** se encuentre el texto `No hay pokémones para la búsqueda` (mostrado al no encontrar resultados).

## `testValidPartialSearch`

Comprueba que en una **búsqueda parcial válida** (ej.: `char`) el código de estado devuelto sea `200` y además se encuentre el texto `Habilidades` (incluido en las tarjetas de resultado) y que **no** se encuentre el texto `No hay pokémones para la búsqueda` (mostrado al no encontrar resultados).

## `testInvalidSearch`

Comprueba que en una **búsqueda inválida** (ej.: `alf`) el código de estado devuelto sea `200` y además **no** se encuentre el texto `Habilidades` (incluido en las tarjetas de resultado) y que se encuentre el texto `No hay pokémones para la búsqueda` (mostrado al no encontrar resultados).
