# Instrucciones para Ejecutar el Proyecto Backend en Laravel 10

Sigue estos pasos para ejecutar el proyecto backend en tu máquina local:

1. **Descargar el Repositorio**:
   - Clona el repositorio utilizando el siguiente comando:
     ```bash
     git clone https://github.com/keymerjose/test_ikbo_backend
     ```

2. **Instalar Composer**:
   - Descarga e instala Composer desde [getcomposer.org](https://getcomposer.org/download/).
   - Asegúrate de que Composer esté disponible en tu terminal. Puedes verificarlo ejecutando:
     ```bash
     composer --version
     ```

3. **Abrir la Terminal**:
   - Abre el símbolo del sistema (CMD) o tu terminal preferida.
   - Navega a la carpeta del proyecto utilizando el comando `cd`. Por ejemplo:
     ```bash
     cd ruta/a/tu/proyecto
     ```

4. **Instalar Dependencias**:
   - Ejecuta el siguiente comando para instalar las dependencias del proyecto:
     ```bash
     composer install
     ```

5. **Configurar el Archivo `.env`**:
   - Revisa el archivo `.env` y modifica las siguientes variables según sea necesario:
     - `DB_CONNECTION`: Asegúrate de que sea `mysql`.
     - `DB_HOST`: Dirección del servidor MySQL (por defecto es `127.0.0.1`).
     - `DB_PORT`: Puerto de conexión (por defecto es `3306`).
     - `DB_DATABASE`: Nombre de la base de datos que se creará.
     - `DB_USERNAME`: Nombre de usuario de MySQL.
     - `DB_PASSWORD`: Contraseña de MySQL.

6. **Levantar el Servidor MySQL**:
   - Inicia tu servidor MySQL utilizando el cliente preferido (XAMPP, WAMP, MAMP, etc.).

7. **Crear la Base de Datos**:
   - Ejecuta el siguiente comando para crear la base de datos especificada en el archivo `.env`:
     ```bash
     php artisan db:create
     ```

8. **Ejecutar Migraciones y Seeders**:
   - Ejecuta las migraciones y los seeders para establecer la estructura de la base de datos y poblarla con datos iniciales:
     ```bash
     php artisan migrate --seed
     ```

9. **Levantar el Servidor**:
   - Finalmente, ejecuta el siguiente comando para iniciar el servidor de desarrollo:
     ```bash
     php artisan serve
     ```
   - El servidor debería estar corriendo en `http://localhost:8000` por defecto.

### Notas Adicionales
- Asegúrate de tener PHP 8.1 o superior instalado en tu máquina, ya que Laravel 10 requiere esta versión como mínimo.
- Si usas Laravel Sail para el entorno de desarrollo basado en Docker, asegúrate de seguir los pasos de configuración de Sail en lugar de los comandos mencionados.
- Si encuentras algún error durante la instalación o ejecución, verifica los mensajes de error y consulta la documentación oficial de [Laravel](https://laravel.com/docs/10.x) para obtener más información.

