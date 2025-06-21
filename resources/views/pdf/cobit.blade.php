<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      padding: 30px;
      font-size: 14px;
    }
    h1 {
      color: #0f766e;
      margin-bottom: 10px;
    }
    h2 {
      color: #0f766e;
      margin-top: 30px;
      border-bottom: 2px solid #0f766e;
      padding-bottom: 5px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      font-size: 13px;
      text-align: left;
      vertical-align: top;
    }
    th {
      background-color: #f0fdf4;
    }
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
      padding-right: 5px;
      color: white;
      font-size: 12px;
      line-height: 18px;
      text-align: right;
    }
    .bar-red { background-color: #dc2626; }
    .bar-orange { background-color: #f97316; }
    .bar-yellow { background-color: #eab308; }
    .bar-green { background-color: #16a34a; }
    .bar-teal { background-color: #0f766e; }
    .recommendation {
      font-size: 0.9em;
      color: #555;
    }
    footer {
      margin-top: 60px;
      font-size: 12px;
      text-align: center;
      color: #888;
    }
  </style>
</head>
<body>
  <h1>Reporte de Evaluación COBIT</h1>

  <table>
    <tr>
      <td><strong>Usuario:</strong></td>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <td><strong>Fecha:</strong></td>
      <td>{{ $fecha }}</td>
    </tr>
  </table>

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
        $nivel < 20 => 'Se recomienda realizar un diagnóstico profundo del dominio y definir procesos básicos de control.',
        $nivel < 40 => 'Implementar políticas mínimas de gestión y establecer controles fundamentales.',
        $nivel < 60 => 'Revisar los procesos existentes, mejorar su documentación y alinear con objetivos de TI.',
        $nivel < 80 => 'Fortalecer el monitoreo, definir métricas de desempeño y comenzar a automatizar.',
        default => 'Consolidar prácticas exitosas, actualizar políticas y mantener una cultura de mejora continua.',
      };
    }

    $promedio = round($evaluaciones->avg('nivel'));
    $colorClass = colorBar($promedio);
    $rango = match(true) {
      $promedio < 40 => 'Madurez baja',
      $promedio < 70 => 'Madurez media',
      default => 'Madurez alta',
    };
  @endphp

  <div style="margin-top: 30px;">
    <h2>Promedio general de madurez</h2>
    <div class="bar-container" style="margin-top: 10px;">
      <div class="bar-fill {{ $colorClass }}" style="width: {{ $promedio }}%">
        {{ $promedio }}%
      </div>
    </div>
    <p style="margin-top: 8px; color: #555;"><em>{{ $rango }}</em></p>
  </div>

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
        @foreach($evaluaciones as $eval)
          <tr>
            <td>{{ $dominios[strtoupper($eval->domain)] ?? $eval->domain }}</td>
            <td>{{ $eval->nivel }}%</td>
            <td>
              <div class="bar-container">
                <div class="bar-fill {{ colorBar($eval->nivel) }}" style="width: {{ $eval->nivel }}%">
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

  <footer>
    Este informe fue generado automáticamente por el sistema de evaluación COBIT.
  </footer>
</body>
</html>
