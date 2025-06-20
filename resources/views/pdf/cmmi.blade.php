<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; padding: 30px; }
    h1 { color: #0f766e; }
    .section { margin-top: 30px; }
    .bar-container {
      width: 100%;
      background-color: #f3f4f6;
      border-radius: 8px;
      margin-top: 10px;
    }
    .bar {
      height: 24px;
      border-radius: 8px;
      text-align: center;
      color: white;
      line-height: 24px;
      font-weight: bold;
    }
    .nivel-1 { background-color: #dc2626; width: 20%; }
    .nivel-2 { background-color: #f97316; width: 40%; }
    .nivel-3 { background-color: #eab308; width: 60%; }
    .nivel-4 { background-color: #16a34a; width: 80%; }
    .nivel-5 { background-color: #059669; width: 100%; }
    .recomendacion {
      background-color: #f9fafb;
      padding: 12px;
      border-left: 4px solid #0f766e;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Reporte de Evaluación CMMI</h1>
  <p><strong>Usuario:</strong> {{ $user->name }}</p>
  <p><strong>Fecha:</strong> {{ $fecha }}</p>

  @php
    $nivel = $evaluacion->nivel;
    $descripcion = [
      1 => 'Inicial: Procesos impredecibles y reactivos.',
      2 => 'Gestionado: Procesos planificados y seguidos.',
      3 => 'Definido: Procesos estandarizados y documentados.',
      4 => 'Gestionado cuantitativamente: Medido y controlado.',
      5 => 'Optimizado: Mejora continua institucionalizada.',
    ][$nivel] ?? 'No definido';

    $recomendaciones = [
      1 => 'Se recomienda comenzar con una evaluación organizacional y establecer procedimientos básicos.',
      2 => 'Formalizar roles, responsabilidades y seguir planes establecidos de forma consistente.',
      3 => 'Consolidar la documentación y capacitar a los equipos en prácticas estandarizadas.',
      4 => 'Implementar métricas para medir desempeño y gestionar por resultados.',
      5 => 'Fomentar una cultura de mejora continua con innovación y retroalimentación sistemática.',
    ];
  @endphp

  <div class="section">
    <h2>Nivel obtenido: {{ $nivel }}</h2>
    <div class="bar-container">
      <div class="bar nivel-{{ $nivel }}">
        Nivel {{ $nivel }}
      </div>
    </div>
    <p style="margin-top: 10px;"><strong>Interpretación:</strong> {{ $descripcion }}</p>

    <div class="recomendacion">
      <strong>Recomendación:</strong><br>
      {{ $recomendaciones[$nivel] ?? 'No disponible.' }}
    </div>
  </div>

  <div class="section">
    <h2>¿Qué es CMMI?</h2>
    <p>
      CMMI (Capability Maturity Model Integration) es un modelo que proporciona a las organizaciones
      un marco para mejorar procesos y desempeño. Se estructura en cinco niveles de madurez que
      representan el grado de formalización y optimización de procesos dentro de una organización.
    </p>
  </div>
</body>
</html>
