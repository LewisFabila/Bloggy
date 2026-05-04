# Bloggy - Sistema de Blog
⚠️ README creado con ayuda de GitHub Copilot, puede presentar errores en alguna explicacion pero los rasgos mas importantes fueron revisados. ⚠️

**Usuario de Pruebas:**
Correo: admin@gmail.com
Contraseña: admin

## 📋 Tabla de Contenidos

- [Descripción del Proyecto](#descripción-del-proyecto)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Cómo Ejecutar](#cómo-ejecutar)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Funcionalidades](#funcionalidades)
- [Base de Datos](#base-de-datos)
- [Rutas Disponibles](#rutas-disponibles)
- [Solución de Problemas](#solución-de-problemas)

---

## 📖 Descripción del Proyecto

**Bloggy** es una aplicación web de gestión de blogs que implementa un CRUD (Crear, Leer, Actualizar, Eliminar) completo. Los usuarios pueden:

- **Registrarse** con su correo electrónico y contraseña.
- **Iniciar sesión** de forma segura.
- **Crear publicaciones** de blog con título, contenido e imagen.
- **Visualizar** todas las publicaciones ordenadas por fecha más reciente.
- **Ver solo sus publicaciones** con un filtro personalizado.
- **Editar** sus propias publicaciones.
- **Eliminar** sus propias publicaciones.
- **Cerrar sesión** de forma segura

---

## 🔧 Requisitos del Sistema

Para ejecutar este proyecto, necesitas:

### Software Requerido
- **PHP 8.2 o superior**
- **MySQL 5.7 o superior** (o MariaDB 10.3+)
- **Composer** (gestor de paquetes de PHP)
- **XAMPP** o cualquier servidor local con Apache, PHP y MySQL

### Extensiones PHP Requeridas
- `php-intl`
- `php-mbstring`
- `php-mysql` o `php-mysqli`

### Navegador Web
- Cualquier navegador moderno (Chrome, Firefox, Safari, Edge)

---

## 💾 Instalación

### Paso 1: Descargar el Proyecto

Si aún no has descargado el proyecto, clónalo o descárgalo desde tu repositorio:

```bash
git clone https://github.com/LewisFabila/Bloggy bloggy_crud
cd bloggy_crud
```

### Paso 2: Instalar Dependencias

Asegúrate de que Composer está instalado. Luego, instala las dependencias del proyecto:

```bash
composer install
```

Este comando descargará todas las dependencias necesarias incluidas en el archivo `composer.json`.

### Paso 3: Copiar archivo de Configuración

Copia el archivo de ejemplo de configuración del entorno:

```bash
# En Windows
copy .env.example .env

# En Linux/Mac
cp .env.example .env
```

Si no existe `.env.example`, asegúrate de que existe un archivo `.env` en la raíz del proyecto.

---

## ⚙️ Configuración

### Configurar la Base de Datos

Edita el archivo `.env` en la raíz del proyecto y actualiza la sección de base de datos:

```env
# BASE DE DATOS
database.default.hostname = localhost
database.default.database = bloggy_crud
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

**Notas:**
- `hostname`: Por defecto es `localhost`
- `database`: El nombre de la base de datos (asegúrate de crearla primero)
- `username`: Usuario de MySQL (por defecto `root` en XAMPP)
- `password`: Contraseña de MySQL (vacía por defecto en XAMPP)
- `port`: Puerto de MySQL (por defecto `3306`)

### Configurar la URL Base

También en `.env`, asegúrate de que la URL base esté correcta:

```env
app.baseURL = 'http://localhost:8080/'
```

Ajusta el puerto según lo que uses en tu servidor local.

---

## 🚀 Cómo Ejecutar

### Paso 1: Crear la Base de Datos

Abre **phpMyAdmin** (usualmente en `http://localhost/phpmyadmin`) o tu cliente MySQL preferido y crea una nueva base de datos llamada `bloggy_crud`:

```sql
CREATE DATABASE bloggy_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Paso 2: Crear las Tablas

En la carpeta `app/Database/Migrations/`, encontrarás las migraciones. Ejecuta el siguiente comando para crear las tablas automáticamente:

```bash
php spark migrate
```

Si las migraciones no existen, aquí están los SQL para crear las tablas manualmente:

#### Tabla `users`
```sql
CREATE TABLE users (
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  type VARCHAR(20) DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

#### Tabla `posts`
```sql
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_user INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  content LONGTEXT NOT NULL,
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### Paso 3: Iniciar el Servidor

Abre una terminal en la carpeta del proyecto y ejecuta:

```bash
php spark serve
```

El servidor estará disponible en `http://localhost:8080/` (o el puerto configurado en `.env`).

### Paso 4: Acceder a la Aplicación

Abre tu navegador y ve a:

```
http://localhost:8080/
```

---

## 📁 Estructura del Proyecto

```
bloggy_crud/
├── app/
│   ├── Config/              # Archivos de configuración
│   │   ├── Routes.php       # Definición de rutas
│   │   ├── Database.php     # Configuración de base de datos
│   │   └── ...
│   ├── Controllers/         # Controladores principales
│   │   ├── Home.php         # Página de inicio
│   │   ├── Login.php        # Controlador de login
│   │   ├── Register.php     # Controlador de registro
│   │   └── Blog.php         # Controlador principal del blog
│   ├── Models/              # Modelos de base de datos
│   │   ├── Users.php        # Modelo de usuarios
│   │   └── Posts.php        # Modelo de publicaciones
│   ├── Views/               # Vistas (HTML)
│   │   ├── login_view.php   # Vista de login
│   │   ├── register_view.php# Vista de registro
│   │   ├── blog_view.php    # Vista principal del blog
│   │   └── ...
│   ├── Database/
│   │   ├── Migrations/      # Migraciones de base de datos
│   │   └── Seeds/           # Semillas de datos (opcional)
│   └── Helpers/             # Funciones auxiliares
│       ├── toast_helper.php # Helper para notificaciones
│       └── post-time_helper.php # Helper para formato de tiempo
├── public/                  # Carpeta pública (CSS, JS, imágenes)
│   ├── index.php            # Punto de entrada de la aplicación
│   └── uploads/             # Carpeta de uploads de imágenes
├── system/                  # Framework CodeIgniter 4
├── writable/                # Carpeta escribible (logs, caché)
├── .env                     # Configuración de entorno
├── composer.json            # Dependencias del proyecto
└── README.md               # Este archivo
```

---

## ✨ Funcionalidades

### 1. **Autenticación de Usuarios**
- Registro de nuevos usuarios con email y contraseña
- Validación de datos en tiempo real
- Contraseñas hasheadas con algoritmo seguro
- Sistema de sesiones

### 2. **Gestión de Publicaciones (CRUD)**
- **Crear**: Los usuarios pueden crear nuevas publicaciones con título, contenido e imagen
- **Leer**: Ver todas las publicaciones o solo las propias
- **Actualizar**: Editar publicaciones existentes
- **Eliminar**: Borrar publicaciones

### 3. **Sistema de Sesiones**
- Mantiene sesión del usuario logueado
- Protección de rutas (solo usuarios logueados pueden acceder al blog)
- Cierre de sesión seguro

### 4. **Validación de Datos**
- Validación de email
- Validación de contraseña
- Validación de campos requeridos
- Validación de longitud mínima

### 5. **Interfaz Responsive**
- Diseño adaptable a dispositivos móviles
- Sistema de notificaciones (toast)
- Mensajes de error y éxito

---

## 🗄️ Base de Datos

### Tabla `users`
| Campo | Tipo | Descripción |
|-------|------|------------|
| `id_user` | INT | ID único del usuario (clave primaria) |
| `user` | VARCHAR(100) | Nombre de usuario |
| `email` | VARCHAR(100) | Email único del usuario |
| `password` | VARCHAR(255) | Contraseña hasheada |
| `type` | VARCHAR(20) | Tipo de usuario (por defecto 'user') |
| `created_at` | TIMESTAMP | Fecha de creación |
| `updated_at` | TIMESTAMP | Fecha de última actualización |

### Tabla `posts`
| Campo | Tipo | Descripción |
|-------|------|------------|
| `id` | INT | ID único de la publicación |
| `id_user` | INT | ID del usuario autor |
| `title` | VARCHAR(255) | Título de la publicación |
| `content` | LONGTEXT | Contenido de la publicación |
| `image` | VARCHAR(255) | Ruta de la imagen (opcional) |
| `created_at` | TIMESTAMP | Fecha de creación |
| `updated_at` | TIMESTAMP | Fecha de última actualización |

---

## 🌐 Rutas Disponibles

| Ruta | Método | Controlador | Descripción |
|------|--------|-------------|------------|
| `/` | GET | Login::index | Página de inicio (login) |
| `/login` | POST | Login::login | Procesa el inicio de sesión |
| `/register` | GET | Register::index | Página de registro |
| `/register/create` | POST | Register::create | Procesa el registro |
| `/blog` | GET | Blog::index | Página principal del blog |
| `/blog/logout` | GET | Blog::logout | Cierra la sesión |
| `/blog/post` | POST | Blog::storePost | Crea una nueva publicación |
| `/blog/my-posts` | GET | Blog::myPosts | Muestra solo tus publicaciones |

---

## 🐛 Solución de Problemas

### Error: "No such file or directory"
**Causa**: La base de datos no está configurada correctamente.

**Solución**:
1. Verifica que `.env` exista en la raíz del proyecto
2. Confirma que los datos de conexión en `.env` sean correctos
3. Asegúrate de que la base de datos `bloggy_crud` exista
4. Reinicia el servidor: `php spark serve`

### Error: "Database connection failed"
**Causa**: MySQL no está ejecutándose o los datos de conexión son incorrectos.

**Solución**:
1. Si usas XAMPP, abre el Panel de Control y asegúrate de que MySQL está iniciado
2. Verifica el puerto de MySQL (por defecto 3306)
3. Revisa el usuario y contraseña en `.env`

### Error: "500 Internal Server Error"
**Causa**: Puede haber un error en el código o la configuración.

**Solución**:
1. Revisa los logs en `/writable/logs/`
2. Asegúrate de que las extensiones PHP requeridas estén activadas
3. Verifica la sintaxis del archivo `.env`

### Página en blanco después de registrarse
**Causa**: Posiblemente las migraciones de base de datos no se ejecutaron.

**Solución**:
```bash
php spark migrate
```

### Las imágenes no se suben correctamente
**Causa**: Los permisos en la carpeta `/public/uploads/` pueden no ser suficientes.

**Solución**:
1. Crea la carpeta si no existe: `mkdir public/uploads`
2. Asegúrate de que tiene permisos de escritura

---

## 📝 Notas Importantes

- **Seguridad**: Las contraseñas se almacenan hasheadas usando algoritmos seguros. Nunca almacenes contraseñas en texto plano.
- **Validación**: Todos los datos de entrada se validan en el servidor. No confíes únicamente en la validación del cliente.
- **Sesiones**: Las sesiones se almacenan por defecto en archivos. Para producción, considera usar una base de datos o Redis.
- **Archivo de Configuración**: El archivo `.env` contiene información sensible. **Nunca lo subas a un repositorio público**.

---

## 🤝 Contribuciones

Si encuentras bugs o quieres mejorar el proyecto, siéntete libre de reportarlos o enviar pull requests.

---

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Puedes usar, modificar y distribuir este código libremente.

---

## ❓ Soporte

Si tienes preguntas o problemas:

1. Revisa este README completamente
2. Consulta la [documentación oficial de CodeIgniter 4](https://codeigniter.com/user_guide/index.html)
3. Abre un issue en el repositorio del proyecto

---

**¡Gracias por usar Bloggy! 🚀**