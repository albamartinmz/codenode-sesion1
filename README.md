# Formulario de Contacto
### Prácticas Codenode · Semana 1

---

## Descripción

Formulario de contacto desarrollado con HTML semántico, CSS moderno, JavaScript para validación en el cliente y PHP para el procesamiento en el servidor.

---

## Estructura de archivos

codenode-sesion1/
├── README.md
└── formulario/
    ├── index.html
    ├── styles.css
    ├── script.js
    ├── index.php
    └── confirmation.php


La lógica PHP y la presentación están separadas siguiendo buenas prácticas:
- `index.php` solo procesa y valida los datos, sin HTML
- `confirmation.php` solo muestra el resultado, sin lógica


## Campos del formulario

| Campo      | Tipo   | Obligatorio | Validación                              |
|------------|--------|-------------|------------------------------------------|
| Nombre     | Texto  | Sí          | Solo letras (incluye caracteres internacionales) |
| Apellidos  | Texto  | Sí          | Solo letras (incluye caracteres internacionales) |
| Email      | Email  | Sí          | Formato válido con @ y dominio           |
| Teléfono   | Tel    | No          | Formato numérico, 7-15 caracteres        |
| Mensaje    | Textarea | Sí        | No puede estar vacío                     |


## Tecnologías utilizadas

- **HTML5** — Estructura semántica con `<main>`, `<section>`, `<fieldset>`, `<legend>`, `<label>`
- **CSS3** — Variables CSS, Flexbox, animaciones, diseño responsive
- **JavaScript** — Validación en el cliente con expresiones regulares, eventos `blur` y `submit`
- **PHP** — Validación en el servidor, saneamiento de datos con `htmlspecialchars` y `filter_var`


## Cómo ejecutarlo

### Requisitos
- XAMPP (Apache activo)

### Pasos

1. Copia la carpeta `formulario/` dentro de:
   
   C:\xampp\htdocs\codenode\semana1\formulario\
   

2. Abre el XAMPP Control Panel y arranca **Apache**.  
   > Si Apache no arranca desde el panel, ábrelo manualmente con CMD como administrador:
   
   C:\xampp\apache\bin\httpd.exe
   

3. Abre el navegador y accede a:
   
   http://localhost:8080/codenode/semana1/formulario/
   


## Validaciones implementadas

### JavaScript (frontend)
- Se activan al salir de cada campo (`blur`) y al intentar enviar el formulario
- Si hay errores, el campo se marca en rojo y aparece un mensaje descriptivo
- El formulario **no se envía** si hay algún error

### PHP (backend)
- Segunda capa de validación independiente del navegador
- Para prevenir ataque XSS, con `htmlspecialchars` convierte caracteres peligrosos en texto para evitar que un usuario inyecte código malicioso en la página.
- Muestra una tabla con los datos recibidos si todo es correcto
- Muestra la lista de errores si alguna validación falla


## Caracteres soportados en nombre y apellidos

La validación acepta caracteres de múltiples idiomas:

- Español: á, é, í, ó, ú, ü, ñ
- Francés: à, â, ç, è, ê, ë, î, ï, ô
- Alemán: ä, ö, ü y variantes
- Portugués: ã, õ
- Nórdicos: å, æ, ø, þ, ð
- Eslavos: č, š, ž, ć, đ, ł, ń
- Húngaro: ő, ű
- Rumano: ă, ş, ţ
- Guión `-` y apóstrofe `'` (para nombres como O'Brien o Jean-Pierre)

---

*Desarrollado por Alba Martín durante las prácticas DAW en CodeNode*
