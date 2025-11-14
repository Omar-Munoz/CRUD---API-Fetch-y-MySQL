# 📘 README.md -- Laboratorio CRUD con Fetch + PHP OOP + MySQL

**Estudiante:** William Concepción, Alex Perez --- Grupo 1SF131\
**Materia:** Ingeniería Web\
**Instructor:** Ing. Irina Fong\
**Fecha:** II Semestre 2025

------------------------------------------------------------------------

# 🧪 Laboratorio: CRUD + API Fetch + PHP OOP + MySQL

(Guardar, Editar, Buscar productos usando formulario dinámico)

Este laboratorio implementa un CRUD completo utilizando JavaScript
(fetch + FormData) con PHP orientado a objetos y MySQL.\
Incluye validación, respuestas JSON, manejo de errores, Bootstrap y
SweetAlert2 para la interfaz.

------------------------------------------------------------------------

# 📌 Índice

1.  Requisitos previos\
2.  Estructura del proyecto\
3.  Configuración de la base de datos\
4.  Explicación de cada archivo\
5.  Flujo de funcionamiento\
6.  Pruebas realizadas\
7.  Dificultades encontradas\
8.  Capturas recomendadas\
9.  Conclusiones

------------------------------------------------------------------------

# ✔ 1. Requisitos previos

-   XAMPP o WAMP\
-   PHP 7.4+\
-   MySQL\
-   Navegador actualizado\
-   VS Code\
-   Bootstrap y SweetAlert2 vía CDN

------------------------------------------------------------------------

# ✔ 2. Estructura del Proyecto

    /ProyectoCRUD
    │── index.html
    │── script.js
    │── registrar.php
    │
    └── Modelo/
         ├── conexion.php
         └── Productos.php

------------------------------------------------------------------------

# ✔ 3. Configuración de la Base de Datos

``` sql
CREATE DATABASE productosdb;

USE productosdb;

CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  codigo   VARCHAR(20) NOT NULL,
  producto VARCHAR(100) NOT NULL,
  precio   DECIMAL(10,2) NOT NULL,
  cantidad INT NOT NULL
);
```

------------------------------------------------------------------------

# ✔ 4. Explicación de Archivos

## 📁 Modelo/conexion.php

Clase PDO con métodos seguros para insertar, actualizar y consultar.

## 📁 Modelo/Productos.php

Clase que gestiona: - Validación\
- Guardar\
- Editar\
- Buscar\
- Listar

## 📁 registrar.php

Controlador central que: - Recibe POST vía fetch\
- Usa switch(Accion)\
- Devuelve JSON limpio

## 🌐 index.html

Formulario con Bootstrap: Código, Producto, Precio, Cantidad.\
Tabla dinámica para listar productos.

## 🎯 script.js

-   Maneja botones\
-   Usa fetch + FormData\
-   Muestra SweetAlert2\
-   Actualiza tabla automáticamente

------------------------------------------------------------------------

# ✔ 5. Flujo de Funcionamiento

1.  Usuario llena el formulario\
2.  JS crea FormData\
3.  Envia fetch() → registrar.php\
4.  PHP procesa con switch\
5.  Devuelve JSON\
6.  SweetAlert2 muestra resultado\
7.  Tabla se recarga

------------------------------------------------------------------------

# ✔ 6. Pruebas Realizadas

-   Guardar ✔\
-   Editar ✔\
-   Buscar ✔\
-   Listar ✔\
-   Validaciones ✔\
-   Respuestas JSON ✔

------------------------------------------------------------------------

# ✔ 7. Dificultades Encontradas

  Dificultad           Solución
  -------------------- -------------------------------------------------
  Campos no enviados   Agregar atributo **name** en inputs
  JSON roto            Limpiar header + remover espacios antes del PHP
  Validación fallaba   Método validar() en modelo
  Update fallaba       Agregar hidden input id

------------------------------------------------------------------------

# ✔ 8. Capturas Recomendadas

-   Formulario\
-   SweetAlert2\
-   Tabla\
-   Código\
-   Network → JSON\
-   Base de datos

------------------------------------------------------------------------

# ✔ 9. Conclusiones

Se implementó un CRUD completo con buenas prácticas modernas: Fetch API,
PHP OOP, PDO, JSON y Bootstrap.\
El sistema es escalable, seguro y cumple con todos los requisitos de la
guía.

------------------------------------------------------------------------

# 📝 Fin del README
