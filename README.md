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
* **SQLite / MySQL** (datos principales)
* **MongoDB** (logs)
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

php artisan migrate --seed

php artisan serve
```

---

## 🔑 Acceso de prueba

```text
Email: admin@test.com
Password: password
```

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
* `POST /api/inventory` (update o create)

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

* **Models**: gestión de datos (`User`, `Character`, `Item`, `Inventory`, `ActionLog`)
* **Controllers**:

  * API Controllers → lógica REST
  * Web Controllers → vistas Blade
* **Form Requests** → validación de datos
* **Policies** → control de permisos
* **Services** → lógica reutilizable (`ActionLogService`)

---

## 📊 Logs en MongoDB

Se ha implementado un sistema de logs para registrar acciones relevantes:

### Acciones registradas:

* creación de personajes
* actualización de personajes
* eliminación de personajes
* actualización de inventario

### Estructura del log:

```json
{
  "action": "character_created",
  "user_id": 1,
  "character_id": 5,
  "item_id": null,
  "metadata": {
    "name": "Hero",
    "level": 10
  },
  "created_at": "2026-04-19"
}
```

Colección utilizada: `logs`

---

## 🧪 Testing

Se han realizado pruebas mediante:

* Thunder Client / Postman (API)
* Navegador (interfaz web)
* Tinker (verificación de MongoDB)

---

## 🧑‍💻 Uso de IA

Se ha utilizado ChatGPT como herramienta de apoyo para:

* resolución de errores
* generación de ejemplos de código
* comprensión de conceptos de Laravel

Todas las soluciones han sido adaptadas y comprendidas antes de su implementación.

---

## 📦 Control de versiones

Se ha utilizado Git con commits estructurados:

* `feat` → nuevas funcionalidades
* `fix` → corrección de errores
* `chore` → mantenimiento

Se han gestionado tareas mediante issues.

---

## 🎥 Vídeo demo

En el vídeo se muestra:

* login en la aplicación
* gestión de personajes
* uso de la API
* visualización de logs en MongoDB

---

## 📌 Autor

Proyecto desarrollado para DAW
Alumno: Enric Terrones

---
