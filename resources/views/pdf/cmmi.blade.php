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

    .section {
      margin-top: 30px;
    }

    .bar-container {
      width: 100%;
      background-color: #f3f4f6;
      border-radius: 8px;
      margin-top: 10px;
    }

    .bar {
      height: 24px;
      border-radius: 8px;
      padding-left: 10px;
      color: white;
      line-height: 24px;
      font-weight: bold;
    }

    .nivel-1 {
      background-color: #dc2626;
      width: 20%;
    }

    .nivel-2 {
      background-color: #f97316;
      width: 40%;
    }

    .nivel-3 {
      background-color: #eab308;
      width: 60%;
    }

    .nivel-4 {
      background-color: #16a34a;
      width: 80%;
    }

    .nivel-5 {
      background-color: #059669;
      width: 100%;
    }

    .recomendacion {
      background-color: #f9fafb;
      padding: 12px;
      border-left: 4px solid #0f766e;
      margin-top: 10px;
    }

    table {
      margin-top: 10px;
      border-collapse: collapse;
    }

    td {
      padding: 4px 8px;
      vertical-align: top;
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
  <h1>Reporte de Evaluación CMMI</h1>

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
  $nivel = $evaluacion->nivel;
  $colores = [
  1 => '#dc2626',
  2 => '#f97316',
  3 => '#eab308',
  4 => '#16a34a',
  5 => '#059669',
  ];
  $descripcion = [
  1 => 'Inicial: Procesos impredecibles y reactivos.',
  2 => 'Gestionado: Procesos planificados y seguidos.',
  3 => 'Definido: Procesos estandarizados y documentados.',
  4 => 'Gestionado cuantitativamente: Medido y controlado.',
  5 => 'Optimizado: Mejora continua institucionalizada.',
  ][$nivel] ?? 'No definido';
  $recomendaciones = [
  1 => 'En este nivel, los procesos son impredecibles, mal controlados y reactivos. Se recomienda realizar un diagnóstico organizacional para identificar brechas clave. Es fundamental establecer un marco mínimo de gestión de procesos, definir roles y responsabilidades básicas, y comenzar a documentar procedimientos esenciales para asegurar repetibilidad y control.',

  2 => 'En el nivel 2, los procesos son gestionados pero aún no estandarizados. Se recomienda fortalecer la planificación, establecer métricas básicas de control y asegurar el cumplimiento de los planes. Además, se debe capacitar al personal en buenas prácticas de ejecución, implementar herramientas de seguimiento, y asegurar la trazabilidad de las actividades más críticas.',

  3 => 'Este nivel indica que los procesos están definidos, documentados y estandarizados. La organización debe enfocarse en integrar esos procesos a nivel organizacional, automatizar tareas repetitivas, y establecer un sistema de mejora continua. Es recomendable promover la participación de los equipos en la revisión y mejora de procesos, y asegurar que los estándares estén alineados con objetivos estratégicos.',

  4 => 'Los procesos están gestionados cuantitativamente y basados en métricas. Se recomienda profundizar en el análisis de datos para predecir resultados, ajustar capacidades y optimizar recursos. Implementar dashboards operativos, KPIs a nivel táctico y usar herramientas de análisis avanzado son pasos clave para mejorar la toma de decisiones.',

  5 => 'La organización se encuentra en un estado de mejora continua optimizada. Se recomienda institucionalizar mecanismos de innovación, promover la experimentación controlada y establecer canales formales de retroalimentación. Además, es clave fomentar una cultura de aprendizaje organizacional, apoyar programas de transformación digital y alinear los procesos con la visión a largo plazo de la organización.',
  ];
  @endphp

  <div style="text-align: center; margin-top: 30px;">
    <svg width="180" height="180" viewBox="0 0 36 36">
      <circle cx="18" cy="18" r="16" fill="none" stroke="#e5e7eb" stroke-width="3" />
      <circle cx="18" cy="18" r="16" fill="none"
        stroke="{{ $colores[$nivel] }}"
        stroke-width="3"
        stroke-dasharray="72"
        stroke-dashoffset="{{ 72 - ($nivel * 72 / 5) }}"
        stroke-linecap="round"
        transform="rotate(-90 18 18)" />
      <text x="50%" y="50%" text-anchor="middle" dy=".3em" font-size="4" fill="#111" font-weight="bold">
        Nivel {{ $nivel }}
      </text>
    </svg>
    <div style="margin-top: 10px; font-weight: bold;">Nivel alcanzado: {{ $nivel }}</div>
  </div>
  <div class="section">
    <h2>Nivel obtenido: {{ $nivel }}</h2>
    <div class="bar-container">
      <div class="bar nivel-{{ $nivel }}">
        Nivel {{ $nivel }} – {{ $descripcion }}
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
  <footer>
    Este informe fue generado automáticamente por el sistema de evaluación CMMI.
  </footer>
</body>

</html>