# 📋 Instrucciones para Visualizar el Sistema en el Navegador

## Prerrequisitos
- Laragon debe estar corriendo (Apache/Nginx y MySQL)
- PHP 8.2 o superior
- Composer instalado

## Pasos de Instalación

### 1. Navegar a la carpeta del proyecto
```bash
cd C:\laragon\www\Practicas_Proyecto_Salesiano_III-TSDS\prueba
```

### 2. Crear archivo .env (si no existe)
Si no tienes un archivo `.env`, puedes copiarlo desde `.env.example` o crearlo manualmente.

### 3. Configurar la base de datos en .env
Abre el archivo `.env` y configura:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=salesiano_db
DB_USERNAME=root
DB_PASSWORD=
```

**Importante:** Crea la base de datos `salesiano_db` en Laragon (phpMyAdmin o HeidiSQL).

### 4. Instalar dependencias de Composer
```bash
composer install
```

### 5. Generar clave de la aplicación
```bash
php artisan key:generate
```

### 6. Ejecutar las migraciones
```bash
php artisan migrate
```

### 7. Ejecutar los seeders (crear roles y usuario administrador)
```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

O ejecutar todos los seeders:
```bash
php artisan db:seed
```

### 8. Iniciar el servidor de desarrollo

**Opción A: Usar Laragon** (Recomendado)
- Asegúrate de que Laragon esté corriendo
- El proyecto debería estar disponible en: `http://practicas_proyecto_salesiano_iii-tsds.test` o similar

**Opción B: Servidor de Laravel**
```bash
php artisan serve
```
Esto iniciará el servidor en: `http://127.0.0.1:8000`

### 9. Acceder al sistema en el navegador

Abre tu navegador y ve a:
- **Con Laragon:** `http://practicas_proyecto_salesiano_iii-tsds.test` (o la URL que configuraste)
- **Con artisan serve:** `http://127.0.0.1:8000`

### 10. Credenciales de acceso

**Usuario Administrador:**
- **Email:** admin@salesiano.edu
- **Contraseña:** admin123

## Solución de Problemas

### Error: "No application encryption key has been specified"
Ejecuta: `php artisan key:generate`

### Error: "SQLSTATE[HY000] [1049] Unknown database"
Crea la base de datos `salesiano_db` en Laragon/phpMyAdmin

### Error: "Class 'Spatie\Permission\PermissionRegistrar' not found"
Ejecuta: `composer require spatie/laravel-permission`

### Error 404 en las rutas
Ejecuta: `php artisan route:clear` y `php artisan cache:clear`

## Estructura de URLs del Sistema

- **Home:** `/`
- **Login:** `/login`
- **Usuarios:** `/admin/users`
- **Roles:** `/admin/roles`
- **Afiliados:** `/admin/afiliados`
- **Mediciones:** `/admin/mediciones`
- **Registros Nutricionales:** `/nutritional-records`
- **Registros Psicológicos:** `/psychological-records`
- **Reportes:** `/reports`

## Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ver rutas disponibles
php artisan route:list

# Verificar errores
php artisan about
```

