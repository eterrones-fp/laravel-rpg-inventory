# 🎮 Laravel RPG Inventory

Aplicación desarrollada con Laravel para la gestión de personajes e inventario estilo RPG, combinando API REST, interfaz web y sistema de logs en MongoDB.

---

## 🚀 Funcionalidades

* 🔐 Autenticación de usuarios (login / logout con token)
* 👤 Gestión de personajes (CRUD completo)
* 🎒 Sistema de inventario por personaje
* 🌐 API REST para operaciones backend
* 🖥️ Interfaz web con Blade
* 📊 Logs de acciones almacenados en MongoDB
* 🔒 Control de acceso mediante Policies
* ✅ Validaciones con Form Requests

---

## 🛠️ Tecnologías utilizadas

* **Laravel 12**
* **PHP 8.2**
* **MySQL** (datos principales con Docker)
* **MongoDB** (logs)
* **Mongo Express**
* **Docker (Laravel Sail)**
* **Blade** (frontend)
* **Thunder Client / Postman** (testing API)

---

## ⚙️ Instalación

```bash
git clone https://github.com/eterrones-fp/laravel-rpg-inventory
cd laravel-rpg-inventory

composer install

cp .env.example .env
php artisan key:generate
```

### 🐳 Ejecutar con Docker (Laravel Sail)

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:fresh --seed
```

---

## 🔑 Acceso de prueba

```text
Email: admin@test.com
Password: password
```

---

## 🌐 Acceso a servicios

| Servicio      | URL                   |
| ------------- | --------------------- |
| Aplicación    | http://localhost:8001 |
| Mongo Express | http://localhost:8082 |

---

## 🌐 Endpoints principales (API)

### 🔐 Autenticación

* `POST /api/login`
* `POST /api/logout`

### 👤 Personajes

* `GET /api/characters`
* `POST /api/characters`
* `PUT /api/characters/{id}`
* `DELETE /api/characters/{id}`

### 🎒 Inventario

* `GET /api/characters/{id}/inventory`
* `POST /api/inventory`

---

## 🖥️ Interfaz Web

Rutas principales:

* `/login` → login usuario
* `/characters` → listado de personajes
* `/characters/create` → crear personaje
* `/characters/{id}` → ver detalle
* `/characters/{id}/edit` → editar

---

## 🧠 Arquitectura del proyecto

El proyecto sigue el patrón **MVC (Model-View-Controller)**:

* **Models**: (`User`, `Character`, `Item`, `Inventory`, `ActionLog`)
* **Controllers**:

  * API Controllers → lógica REST
  * Web Controllers → vistas Blade
* **Form Requests** → validación de datos
* **Policies** → control de permisos
* **Services** → (`ActionLogService`)

---

## 📊 Logs en MongoDB

Sistema de logs implementado para registrar acciones relevantes.

### Acciones registradas:

* creación de personajes
* actualización de personajes
* eliminación de personajes
* actualización de inventario

### 📦 Almacenamiento:

* Base de datos: `rpg_inventory_logs`
* Colección: `action_logs`

### Ejemplo:

```json
{
  "action": "character_updated_web",
  "user_id": 1,
  "character_id": 7,
  "item_id": null,
  "metadata": {
    "name": "Pepa",
    "level": 10
  }
}
```

Los logs se visualizan mediante Mongo Express.

---

## 🧪 Testing

Se han realizado pruebas mediante:

* Thunder Client / Postman (API)
* Navegador (interfaz web)
* Mongo Express (visualización de logs)

---

## 🧑‍💻 Uso de IA

Se ha utilizado ChatGPT como herramienta de apoyo para:

* resolución de errores
* generación de ejemplos de código
* comprensión de conceptos de Laravel

Todas las soluciones han sido comprendidas antes de su implementación.

---

## 📦 Control de versiones

Se ha utilizado Git con commits estructurados:

* `feat` → nuevas funcionalidades
* `fix` → corrección de errores
* `chore` → mantenimiento

Gestión de tareas mediante issues.

---

## 🎥 Vídeo demo

https://drive.google.com/drive/folders/1eldOephI6lJn9xjRflnuu8mdTtxYQjOL

En el vídeo se muestra:

* login en la aplicación
* gestión de personajes
* uso de la API
* visualización de logs en MongoDB mediante Mongo Express

---

## 📌 Autor

Proyecto desarrollado para DAW
Alumno: Enric Terrones
