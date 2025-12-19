# 🔧 Solución de Problemas - Sistema Salesiano

## Problema: No se puede visualizar en el navegador

### ✅ PASOS PARA SOLUCIONARLO:

### 1️⃣ Verificar que Laragon esté corriendo
- Abre Laragon
- Verifica que Apache/Nginx y MySQL estén en VERDE (activos)

### 2️⃣ Crear archivo .env
El archivo `.env` no existe. Debes crearlo manualmente:

**Opción A - Copiar desde .env.example:**
```powershell
cd C:\laragon\www\Practicas_Proyecto_Salesiano_III-TSDS\prueba
copy .env.example .env
```

**Opción B - Crear manualmente:**
Crea un archivo llamado `.env` en la carpeta `prueba` con este contenido:

```env
APP_NAME="Sistema de Gestión Salesiano"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=America/Lima
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=salesiano_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
```

### 3️⃣ Crear la base de datos
1. Abre Laragon → MySQL → HeidiSQL (o phpMyAdmin)
2. Crea una base de datos llamada: `salesiano_db`

### 4️⃣ Generar clave de aplicación
```powershell
cd C:\laragon\www\Practicas_Proyecto_Salesiano_III-TSDS\prueba
php artisan key:generate
```

### 5️⃣ Ejecutar migraciones
```powershell
php artisan migrate
```

### 6️⃣ Ejecutar seeders
```powershell
php artisan db:seed --class=RolesAndPermissionsSeeder
```

### 7️⃣ Verificar dependencias faltantes
```powershell
composer install
```

Si falta Spatie Permission:
```powershell
composer require spatie/laravel-permission
```

### 8️⃣ Iniciar servidor

**Opción A - Con Laragon:**
- Laragon debería servir automáticamente en:
  - `http://practicas_proyecto_salesiano_iii-tsds.test`
  - O `http://localhost/practicas_proyecto_salesiano_iii-tsds/prueba/public`

**Opción B - Con Artisan:**
```powershell
php artisan serve
```
Luego abre: `http://127.0.0.1:8000`

### 9️⃣ Limpiar caché
```powershell
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### 🔟 Acceder al sistema
- URL: `http://127.0.0.1:8000` (si usas artisan serve)
- Login: `http://127.0.0.1:8000/login`

**Credenciales:**
- Email: `admin@salesiano.edu`
- Contraseña: `admin123`

## ❌ ERRORES COMUNES Y SOLUCIONES

### Error: "No application encryption key"
```powershell
php artisan key:generate
```

### Error: "Unknown database"
- Crea la base de datos `salesiano_db` en Laragon

### Error: "Class 'Spatie\Permission\PermissionRegistrar' not found"
```powershell
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

### Error: "Class 'App\Http\Controllers\HomeController' not found"
- Ya fue creado ✅

### Error: "404 Not Found"
```powershell
php artisan route:clear
php artisan cache:clear
```

### Error: "SQLSTATE[42S02]: Base table or view not found"
```powershell
php artisan migrate:fresh
php artisan db:seed --class=RolesAndPermissionsSeeder
```

### Error: Permisos en storage
```powershell
# En Windows, asegúrate de que las carpetas storage/ y bootstrap/cache/ 
# tengan permisos de escritura (clic derecho → Propiedades → Seguridad)
```

## 📝 CHECKLIST COMPLETO

- [ ] Laragon está corriendo (Apache y MySQL en verde)
- [ ] Archivo `.env` existe y está configurado
- [ ] Base de datos `salesiano_db` creada
- [ ] `composer install` ejecutado
- [ ] `php artisan key:generate` ejecutado
- [ ] `php artisan migrate` ejecutado
- [ ] `php artisan db:seed --class=RolesAndPermissionsSeeder` ejecutado
- [ ] Servidor iniciado (`php artisan serve` o Laragon)
- [ ] Acceso a `http://127.0.0.1:8000` funciona

## 🆘 Si aún no funciona

1. Revisa los logs de Laravel:
   - `storage/logs/laravel.log`

2. Verifica errores en el navegador:
   - Presiona F12 → Pestaña Console
   - Pestaña Network para ver errores HTTP

3. Verifica que PHP esté funcionando:
```powershell
php -v
```

4. Verifica que Composer esté funcionando:
```powershell
composer --version
```

