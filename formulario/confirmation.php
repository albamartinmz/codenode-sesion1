<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Confirmación · Formulario de Contacto</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="container">
    <div class="result-box <?= $tipo ?>">

      <?php if ($tipo === "exito"): ?>

        <h2>✓ Formulario recibido</h2>
        <p style="color: var(--muted); font-size: 0.9rem;">
          Estos son los datos que hemos recibido:
        </p>

        <table class="datos-tabla">
          <tr>
            <th>Nombre</th>
            <td><?= $datos["nombre"] ?></td>
          </tr>
          <tr>
            <th>Apellidos</th>
            <td><?= $datos["apellidos"] ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= $datos["email"] ?></td>
          </tr>
          <tr>
            <th>Teléfono</th>
            <td><?= !empty($datos["telefono"]) ? $datos["telefono"] : "<em style='color:var(--muted)'>No indicado</em>" ?></td>
          </tr>
          <tr>
            <th>Mensaje</th>
            <td><?= nl2br($datos["mensaje"]) ?></td>
          </tr>
        </table>

      <?php else: ?>

        <h2>✕ Hay errores en el formulario</h2>
        <p style="color: var(--muted); font-size: 0.9rem;">
          Por favor corrígelos e inténtalo de nuevo:
        </p>
        <ul class="error-list">
          <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
          <?php endforeach; ?>
        </ul>

      <?php endif; ?>

      <a class="back-link" href="index.html">← Volver al formulario</a>

    </div>
  </main>
</body>
</html>
