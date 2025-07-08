# Sistema de Gestión de Concesionario de Autos - Laravel

## Descripción
Este sistema web permite la gestión de autos en un concesionario, con autenticación de usuarios, CRUD de autos, filtros avanzados, subida de imágenes y validaciones robustas. Desarrollado en Laravel, incluye roles básicos y un diseño moderno con Bootstrap.

---

## Requisitos
- PHP >= 8.1
- Composer
- Node.js y npm
- PostgreSQL o MySQL

---

## Instalación y Configuración

1. **Clonar el repositorio**
   ```bash
   git clone <url-del-repo>
   cd Concesionario-Laravel
   ```

2. **Instalar dependencias PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias JS**
   ```bash
   npm install && npm run build
   ```

4. **Configurar el entorno**
   - Copia `.env.example` a `.env` y configura la conexión a la base de datos.
   - Genera la clave de la app:
     ```bash
     php artisan key:generate
     ```

5. **Migrar y poblar la base de datos**
   ```bash
   php artisan migrate --seed
   ```
   Esto creará las tablas y usuarios de prueba (admin, vendedor, cliente).

6. **Crear carpeta para imágenes**
   - Asegúrate de que exista `public/imagenes` y tenga permisos de escritura.

7. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```
   Accede a `http://localhost:8000`.

---

## Usuarios de Prueba
- **Administrador**: admin@email.com / 123456789
- **Vendedor**: vendedor@email.com / 123456789
- **Cliente**: cliente@email.com / 123456789

---

## Funcionalidades

- **Autenticación y registro de usuarios**
- **CRUD de autos** (marca, modelo, año, color, precio, kilometraje, imagen)
- **Subida de imágenes** (opcional, formato jpg/png, máx. 2MB)
- **Listado de autos con paginación, filtros por usuario (admin), año y buscador en tiempo real**
- **Validaciones en frontend y backend**
- **Edición y eliminación de autos**
- **Edición de perfil de usuario**
- **Roles básicos (admin, vendedor, cliente)**
- **Diseño responsivo con Bootstrap**

---

## Uso del Sistema

1. **Iniciar sesión con un usuario de prueba**
2. **Agregar, editar o eliminar autos**
   - Puedes subir una imagen al registrar o editar un auto.
   - Si no subes imagen, se mostrará un cuadro gris con un signo de interrogación.
3. **Filtrar autos**
   - El admin puede filtrar por usuario creador y año.
   - Todos pueden filtrar por año y buscar por marca, modelo o color.
4. **Editar tu perfil**
   - Cambia nombre o email desde el menú de perfil.

---

## Notas para Desarrolladores

- El código sigue PSR-4 y buenas prácticas de Laravel.
- Las migraciones están en `database/migrations`.
- Los seeders de prueba están en `database/seeders`.
- El modelo principal de usuario es `App\Models\Usuario`.
- El modelo de autos es `App\Models\Auto`.
- Las imágenes se guardan en `public/imagenes` y la ruta en la columna `imagen` de la tabla `autos`.
- El middleware de autenticación protege todas las rutas principales.
- El filtro de usuario solo es visible para el admin (por email).
- El buscador y los filtros usan GET y funcionan en tiempo real.
- El sistema es fácilmente extensible para agregar más roles o funcionalidades.

---

## Solución de Problemas

- Si tienes errores de migración por columnas duplicadas, revisa que solo una migración agregue la columna `imagen`.
- Si cambias la estructura de la tabla `autos`, ejecuta `php artisan migrate:fresh --seed` para recrear la base de datos.
- Asegúrate de que la carpeta `public/imagenes` tenga permisos de escritura.

---

## Contacto
Para dudas o mejoras, contacta al desarrollador principal o abre un issue en el repositorio.

## IMAGES

![Login](assents/login.png) 
![Registro](assents/registro.png) 
![Dashboard](assents/dashboard.png) 
![Lista-vehiculos-admin](assents/lista-admin.png) 
