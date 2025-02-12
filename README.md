# List_of_items
This project is a testing technique simulator, lasting 3 hours.
## Pre-requisitos

Para ejecutar este proyecto, necesitas instalar:
- PHP >= 8.0
- Laravel >= 10
- Composer
- Node.js y npm
- Base de datos SQLite / MySQL / PostgreSQL

## Pasos para la Instalación

1. Clonar el repositorio:
   ```sh
   git clone [https://github.com/tu-repositorio/toll-station-management.git](https://github.com/issamchlf/List_of_items.git)
   cd List_of_items
   ```

2. Instalar dependencias del backend:
   ```sh
   composer install
   ```

3. Configurar el archivo `.env`:
   ```sh
   cp .env.example .env
   ```
   Y configurar los datos de la base de datos.
      ```sh
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=list_of_items
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Generar la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```

6. Ejecutar migraciones y seeders:
   ```sh
   php artisan migrate --seed
   ```

7. Instalar dependencias del frontend:
   ```sh
   npm install && npm run dev
   ```

8. Iniciar el servidor:
   ```sh
   php artisan serve
   ```

## Ejecución de los Tests

Para ejecutar las pruebas:
```sh
php artisan test
```

### Captura de la cobertura
![Screenshot 2025-02-12 100809](https://github.com/user-attachments/assets/4440aeda-2196-4d3d-b368-7d45a32e1000)


## Documentación de las APIs (EndPoints)
# API Documentation

## items Routes

| HTTP Method | Endpoint | Controller & Method | Route Name | Description |
|------------|----------|---------------------|------------|-------------|
| **GET** | `/items` | `itemController@index` | `items.index` | Retrieve a list of all items. |
| **POST** | `/items` | `itemController@store` | `items.store` | Create a new items. |
| **GET** | `/items/{id}` | `itemController@show` | `items.show` | Retrieve details of a specific items by ID. |
| **PUT** | `/items/{id}` | `itemController@update` | `items.update` | Update details of a specific items. |
| **DELETE** | `/items/{id}` | `itemController@destroy` | `items.destroy` | Delete a items by ID. |
| **DELETE** | `/items` | `itemController@destroy` | `items.destroyAll` | Delete all items. |

## Autores

- Issam Chellaf - Desarrollador Backend
- Issam Chellaf - Desarrollador Frontend
- Issam Chellaf - Diseñadores, QA, etc.

---

© 2025 Shopping List Test. Todos los derechos reservados.
