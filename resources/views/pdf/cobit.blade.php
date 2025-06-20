<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; padding: 20px; }
    h1 { color: #0f766e; }
    .section { margin-top: 30px; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; font-size: 13px; }
    th { background-color: #f0fdf4; }
    .recommendation { font-size: 0.9em; color: #555; }

    .bar-container {
      background-color: #e5e7eb;
      border-radius: 5px;
      height: 18px;
      width: 100%;
      position: relative;
    }

    .bar-fill {
      height: 100%;
      border-radius: 5px;
      text-align: right;
      padding-right: 5px;
      color: white;
      font-size: 12px;
      line-height: 18px;
    }

    .bar-red { background-color: #dc2626; }
    .bar-orange { background-color: #f97316; }
    .bar-yellow { background-color: #eab308; }
    .bar-green { background-color: #16a34a; }
    .bar-teal { background-color: #0f766e; }
  </style>
</head>
<body>
  <h1>Reporte de Evaluación COBIT</h1>
  <p><strong>Usuario:</strong> {{ $user->name }}</p>
  <p><strong>Fecha:</strong> {{ $fecha }}</p>

  <div class="section">
    <h2>Resultados por dominio</h2>
    <table>
      <thead>
        <tr>
          <th>Dominio</th>
          <th>Nivel (%)</th>
          <th>Visual</th>
          <th>Recomendación</th>
        </tr>
      </thead>
      <tbody>
        @php
          $dominios = [
            'EDM' => 'Evaluar, Dirigir y Monitorizar (EDM)',
            'APO' => 'Alinear, Planificar y Organizar (APO)',
            'BAI' => 'Construir, Adquirir e Implementar (BAI)',
            'DSS' => 'Entregar, Servir y Dar Soporte (DSS)',
            'MEA' => 'Monitorear, Evaluar y Valorar (MEA)',
          ];

          function colorBar($nivel) {
              return match(true) {
                  $nivel < 30 => 'bar-red',
                  $nivel < 50 => 'bar-orange',
                  $nivel < 70 => 'bar-yellow',
                  $nivel < 90 => 'bar-green',
                  default => 'bar-teal',
              };
          }

          function recomendacion($nivel) {
              return match(true) {
                  $nivel < 20 => 'Se recomienda iniciar con una evaluación profunda del dominio.',
                  $nivel < 40 => 'Implementar procesos básicos y controles fundamentales.',
                  $nivel < 60 => 'Revisar procesos y mejorar documentación.',
                  $nivel < 80 => 'Fortalecer monitoreo y automatización.',
                  default => 'Mantener buenas prácticas y actualizar políticas.',
              };
          }
        @endphp

        @foreach($evaluaciones as $eval)
          <tr>
            <td>{{ $dominios[strtoupper($eval->domain)] ?? $eval->domain }}</td>
            <td>{{ $eval->nivel }}%</td>
            <td>
              <div class="bar-container">
                <div class="bar-fill <?php echo colorBar($eval->nivel); ?>" style="width: {{ $eval->nivel }}%">
                </div>
              </div>
            </td>
            <td class="recommendation">{{ recomendacion($eval->nivel) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="section">
    <h2>¿Qué es COBIT?</h2>
    <p>
      COBIT (Control Objectives for Information and Related Technologies) es un marco de gobierno
      y gestión de TI que proporciona buenas prácticas para maximizar el valor de la información
      mediante una gobernanza efectiva de la tecnología.
    </p>
  </div>
</body>
</html>
