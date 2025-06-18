<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Framework;
use App\Models\Process;
use App\Models\Question;
use App\Models\Option;

class QuestionnaireSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM01 - Asegurar el establecimiento y mantenimiento del marco de gobierno',
                'pregunta' => '¿La alta dirección participa activamente en la definición del marco de gobierno?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM01 - Asegurar el establecimiento y mantenimiento del marco de gobierno',
                'pregunta' => '¿Se revisa regularmente el marco de gobierno para asegurar su efectividad?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM01 - Asegurar el establecimiento y mantenimiento del marco de gobierno',
                'pregunta' => '¿Existen políticas documentadas que respalden el marco de gobierno?',
                'opciones' => [
                    ['texto' => '1 - No existe documentación ni registros.', 'puntaje' => 0],
                    ['texto' => '2 - Existe documentación parcial o no actualizada.', 'puntaje' => 1],
                    ['texto' => '3 - La documentación está actualizada pero no se consulta regularmente.', 'puntaje' => 2],
                    ['texto' => '4 - La documentación está actualizada y se consulta ocasionalmente.', 'puntaje' => 3],
                    ['texto' => '5 - La documentación está actualizada, es accesible y se consulta regularmente.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM01 - Asegurar el establecimiento y mantenimiento del marco de gobierno',
                'pregunta' => '¿Se asignan responsabilidades claras para la gobernanza de TI?',
                'opciones' => [
                    ['texto' => '1 - No hay asignación de responsabilidades.', 'puntaje' => 0],
                    ['texto' => '2 - Las responsabilidades están implícitas pero no formales.', 'puntaje' => 1],
                    ['texto' => '3 - Las responsabilidades están parcialmente definidas.', 'puntaje' => 2],
                    ['texto' => '4 - Las responsabilidades están claramente definidas para algunas funciones.', 'puntaje' => 3],
                    ['texto' => '5 - Las responsabilidades están totalmente definidas y documentadas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM01 - Asegurar el establecimiento y mantenimiento del marco de gobierno',
                'pregunta' => '¿Se mide el desempeño del marco de gobierno con indicadores clave?',
                'opciones' => [
                    ['texto' => '1 - No se utilizan indicadores.', 'puntaje' => 0],
                    ['texto' => '2 - Se usan algunos indicadores sin seguimiento.', 'puntaje' => 1],
                    ['texto' => '3 - Se usan indicadores básicos con seguimiento ocasional.', 'puntaje' => 2],
                    ['texto' => '4 - Los indicadores son revisados periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Los indicadores se usan para la toma de decisiones estratégicas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM03 - Asegurar la optimización del riesgo',
                'pregunta' => '¿Se identifican y documentan los riesgos de TI regularmente?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM03 - Asegurar la optimización del riesgo',
                'pregunta' => '¿La empresa tiene un apetito de riesgo claramente definido?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM03 - Asegurar la optimización del riesgo',
                'pregunta' => '¿Se evalúan los riesgos antes de aprobar proyectos clave?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM03 - Asegurar la optimización del riesgo',
                'pregunta' => '¿Existen controles establecidos para mitigar los riesgos?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'EDM03 - Asegurar la optimización del riesgo',
                'pregunta' => '¿Se revisan periódicamente las evaluaciones de riesgo?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO01 - Gestionar el marco de gestión de TI',
                'pregunta' => '¿Existe una estrategia formal de TI alineada con los objetivos de negocio?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO01 - Gestionar el marco de gestión de TI',
                'pregunta' => '¿Se comunica claramente la estrategia de TI a toda la organización?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO01 - Gestionar el marco de gestión de TI',
                'pregunta' => '¿La estrategia de TI se revisa y actualiza regularmente?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO01 - Gestionar el marco de gestión de TI',
                'pregunta' => '¿Se asignan recursos adecuados para implementar la estrategia de TI?',
                'opciones' => [
                    ['texto' => '1 - No hay asignación de responsabilidades.', 'puntaje' => 0],
                    ['texto' => '2 - Las responsabilidades están implícitas pero no formales.', 'puntaje' => 1],
                    ['texto' => '3 - Las responsabilidades están parcialmente definidas.', 'puntaje' => 2],
                    ['texto' => '4 - Las responsabilidades están claramente definidas para algunas funciones.', 'puntaje' => 3],
                    ['texto' => '5 - Las responsabilidades están totalmente definidas y documentadas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO01 - Gestionar el marco de gestión de TI',
                'pregunta' => '¿Existen métricas para evaluar el éxito del marco de gestión de TI?',
                'opciones' => [
                    ['texto' => '1 - No se utilizan indicadores.', 'puntaje' => 0],
                    ['texto' => '2 - Se usan algunos indicadores sin seguimiento.', 'puntaje' => 1],
                    ['texto' => '3 - Se usan indicadores básicos con seguimiento ocasional.', 'puntaje' => 2],
                    ['texto' => '4 - Los indicadores son revisados periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Los indicadores se usan para la toma de decisiones estratégicas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO05 - Gestionar portafolio',
                'pregunta' => '¿Se priorizan los proyectos de TI según los objetivos estratégicos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO05 - Gestionar portafolio',
                'pregunta' => '¿Existe un portafolio documentado de iniciativas de TI?',
                'opciones' => [
                    ['texto' => '1 - No existe documentación ni registros.', 'puntaje' => 0],
                    ['texto' => '2 - Existe documentación parcial o no actualizada.', 'puntaje' => 1],
                    ['texto' => '3 - La documentación está actualizada pero no se consulta regularmente.', 'puntaje' => 2],
                    ['texto' => '4 - La documentación está actualizada y se consulta ocasionalmente.', 'puntaje' => 3],
                    ['texto' => '5 - La documentación está actualizada, es accesible y se consulta regularmente.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO05 - Gestionar portafolio',
                'pregunta' => '¿Se evalúan los beneficios esperados de cada proyecto del portafolio?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO05 - Gestionar portafolio',
                'pregunta' => '¿Se monitorean los recursos asignados a cada iniciativa?',
                'opciones' => [
                    ['texto' => '1 - No hay asignación de responsabilidades.', 'puntaje' => 0],
                    ['texto' => '2 - Las responsabilidades están implícitas pero no formales.', 'puntaje' => 1],
                    ['texto' => '3 - Las responsabilidades están parcialmente definidas.', 'puntaje' => 2],
                    ['texto' => '4 - Las responsabilidades están claramente definidas para algunas funciones.', 'puntaje' => 3],
                    ['texto' => '5 - Las responsabilidades están totalmente definidas y documentadas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO05 - Gestionar portafolio',
                'pregunta' => '¿Se revisa periódicamente el portafolio para garantizar la alineación?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO07 - Gestionar los recursos humanos',
                'pregunta' => '¿Se identifican las habilidades necesarias para el área de TI?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO07 - Gestionar los recursos humanos',
                'pregunta' => '¿Existen planes de capacitación para el personal de TI?',
                'opciones' => [
                    ['texto' => '1 - No se ofrece capacitación.', 'puntaje' => 0],
                    ['texto' => '2 - La capacitación es esporádica y no estructurada.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un programa básico de capacitación.', 'puntaje' => 2],
                    ['texto' => '4 - Se ofrece capacitación estructurada y periódica.', 'puntaje' => 3],
                    ['texto' => '5 - La capacitación está alineada con los objetivos estratégicos de TI.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO07 - Gestionar los recursos humanos',
                'pregunta' => '¿Se realizan evaluaciones de desempeño del equipo de TI?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO07 - Gestionar los recursos humanos',
                'pregunta' => '¿Se promueve el desarrollo profesional del personal de TI?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO07 - Gestionar los recursos humanos',
                'pregunta' => '¿Se documentan los roles y responsabilidades de cada miembro del equipo?',
                'opciones' => [
                    ['texto' => '1 - No hay asignación de responsabilidades.', 'puntaje' => 0],
                    ['texto' => '2 - Las responsabilidades están implícitas pero no formales.', 'puntaje' => 1],
                    ['texto' => '3 - Las responsabilidades están parcialmente definidas.', 'puntaje' => 2],
                    ['texto' => '4 - Las responsabilidades están claramente definidas para algunas funciones.', 'puntaje' => 3],
                    ['texto' => '5 - Las responsabilidades están totalmente definidas y documentadas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO12 - Gestionar el riesgo',
                'pregunta' => '¿Existe una política formal de gestión de riesgos?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO12 - Gestionar el riesgo',
                'pregunta' => '¿Los riesgos se registran en un repositorio central?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO12 - Gestionar el riesgo',
                'pregunta' => '¿Se asignan responsables para cada riesgo identificado?',
                'opciones' => [
                    ['texto' => '1 - No hay asignación de responsabilidades.', 'puntaje' => 0],
                    ['texto' => '2 - Las responsabilidades están implícitas pero no formales.', 'puntaje' => 1],
                    ['texto' => '3 - Las responsabilidades están parcialmente definidas.', 'puntaje' => 2],
                    ['texto' => '4 - Las responsabilidades están claramente definidas para algunas funciones.', 'puntaje' => 3],
                    ['texto' => '5 - Las responsabilidades están totalmente definidas y documentadas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO12 - Gestionar el riesgo',
                'pregunta' => '¿Se analizan las causas raíz de los riesgos recurrentes?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'APO12 - Gestionar el riesgo',
                'pregunta' => '¿Se llevan a cabo simulacros o pruebas de mitigación de riesgos?',
                'opciones' => [
                    ['texto' => '1 - No se gestionan los riesgos.', 'puntaje' => 0],
                    ['texto' => '2 - Se identifican riesgos pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Los riesgos se documentan pero no se gestionan activamente.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestionan riesgos con acciones definidas.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza gestión proactiva de riesgos con mejora continua.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI02 - Gestionar la definición de requisitos',
                'pregunta' => '¿Los requisitos se recogen de todas las partes interesadas relevantes?',
                'opciones' => [
                    ['texto' => '1 - No se consulta a los usuarios o partes interesadas.', 'puntaje' => 0],
                    ['texto' => '2 - Se consulta a pocos usuarios o de forma informal.', 'puntaje' => 1],
                    ['texto' => '3 - Se consulta parcialmente pero sin documentar.', 'puntaje' => 2],
                    ['texto' => '4 - Se consulta sistemáticamente y se documenta.', 'puntaje' => 3],
                    ['texto' => '5 - Se consulta y se considera activamente el aporte de usuarios.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI02 - Gestionar la definición de requisitos',
                'pregunta' => '¿Se documentan y validan los requisitos antes del desarrollo?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI02 - Gestionar la definición de requisitos',
                'pregunta' => '¿Se revisan los requisitos con regularidad?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI02 - Gestionar la definición de requisitos',
                'pregunta' => '¿Existe un control de cambios sobre los requisitos?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI02 - Gestionar la definición de requisitos',
                'pregunta' => '¿Se trazan los requisitos a lo largo del ciclo de vida del proyecto?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI05 - Gestionar la introducción de cambios organizativos',
                'pregunta' => '¿Se analiza el impacto organizacional antes de implementar cambios?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI05 - Gestionar la introducción de cambios organizativos',
                'pregunta' => '¿Se comunican claramente los cambios a todos los niveles?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI05 - Gestionar la introducción de cambios organizativos',
                'pregunta' => '¿Se forma al personal afectado por los cambios?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI05 - Gestionar la introducción de cambios organizativos',
                'pregunta' => '¿Existen métricas para medir la efectividad del cambio?',
                'opciones' => [
                    ['texto' => '1 - No se utilizan indicadores.', 'puntaje' => 0],
                    ['texto' => '2 - Se usan algunos indicadores sin seguimiento.', 'puntaje' => 1],
                    ['texto' => '3 - Se usan indicadores básicos con seguimiento ocasional.', 'puntaje' => 2],
                    ['texto' => '4 - Los indicadores son revisados periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Los indicadores se usan para la toma de decisiones estratégicas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI05 - Gestionar la introducción de cambios organizativos',
                'pregunta' => '¿Se proporciona apoyo continuo durante la transición?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI07 - Gestionar la aceptación del cambio y de la transición',
                'pregunta' => '¿Se validan los resultados del cambio antes de la aceptación?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI07 - Gestionar la aceptación del cambio y de la transición',
                'pregunta' => '¿Se involucra a los usuarios en el proceso de aceptación?',
                'opciones' => [
                    ['texto' => '1 - No se consulta a los usuarios o partes interesadas.', 'puntaje' => 0],
                    ['texto' => '2 - Se consulta a pocos usuarios o de forma informal.', 'puntaje' => 1],
                    ['texto' => '3 - Se consulta parcialmente pero sin documentar.', 'puntaje' => 2],
                    ['texto' => '4 - Se consulta sistemáticamente y se documenta.', 'puntaje' => 3],
                    ['texto' => '5 - Se consulta y se considera activamente el aporte de usuarios.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI07 - Gestionar la aceptación del cambio y de la transición',
                'pregunta' => '¿Se realizan pruebas piloto o implementaciones progresivas?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI07 - Gestionar la aceptación del cambio y de la transición',
                'pregunta' => '¿Se documentan las lecciones aprendidas de cada transición?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'BAI07 - Gestionar la aceptación del cambio y de la transición',
                'pregunta' => '¿Se garantiza la continuidad operativa durante la transición?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS01 - Gestionar las operaciones',
                'pregunta' => '¿Se definen y documentan los procedimientos operativos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS01 - Gestionar las operaciones',
                'pregunta' => '¿Se monitorean las operaciones de TI continuamente?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS01 - Gestionar las operaciones',
                'pregunta' => '¿Existen planes de contingencia para servicios críticos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS01 - Gestionar las operaciones',
                'pregunta' => '¿Se cuenta con procesos automatizados para operaciones rutinarias?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS01 - Gestionar las operaciones',
                'pregunta' => '¿Se revisan periódicamente los indicadores operativos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS03 - Gestionar los problemas',
                'pregunta' => '¿Se identifican y documentan sistemáticamente los problemas?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS03 - Gestionar los problemas',
                'pregunta' => '¿Se realiza un análisis de causa raíz para problemas recurrentes?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS03 - Gestionar los problemas',
                'pregunta' => '¿Se comunican eficazmente las resoluciones de problemas?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS03 - Gestionar los problemas',
                'pregunta' => '¿Se mantienen registros históricos de problemas resueltos?',
                'opciones' => [
                    ['texto' => '1 - No existe documentación ni registros.', 'puntaje' => 0],
                    ['texto' => '2 - Existe documentación parcial o no actualizada.', 'puntaje' => 1],
                    ['texto' => '3 - La documentación está actualizada pero no se consulta regularmente.', 'puntaje' => 2],
                    ['texto' => '4 - La documentación está actualizada y se consulta ocasionalmente.', 'puntaje' => 3],
                    ['texto' => '5 - La documentación está actualizada, es accesible y se consulta regularmente.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'DSS03 - Gestionar los problemas',
                'pregunta' => '¿Se implementan acciones preventivas para evitar la recurrencia?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA01 - Supervisar, evaluar y valorar rendimiento y conformidad',
                'pregunta' => '¿Se utilizan métricas clave para evaluar el rendimiento de TI?',
                'opciones' => [
                    ['texto' => '1 - No se utilizan indicadores.', 'puntaje' => 0],
                    ['texto' => '2 - Se usan algunos indicadores sin seguimiento.', 'puntaje' => 1],
                    ['texto' => '3 - Se usan indicadores básicos con seguimiento ocasional.', 'puntaje' => 2],
                    ['texto' => '4 - Los indicadores son revisados periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Los indicadores se usan para la toma de decisiones estratégicas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA01 - Supervisar, evaluar y valorar rendimiento y conformidad',
                'pregunta' => '¿Se informa regularmente sobre el cumplimiento de políticas?',
                'opciones' => [
                    ['texto' => '1 - No se consideran requisitos externos.', 'puntaje' => 0],
                    ['texto' => '2 - Se conocen pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Se documentan pero no se verifica el cumplimiento.', 'puntaje' => 2],
                    ['texto' => '4 - Se verifica el cumplimiento periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Existe un control formal del cumplimiento normativo.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA01 - Supervisar, evaluar y valorar rendimiento y conformidad',
                'pregunta' => '¿Se realiza auditoría interna de los procesos de TI?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA01 - Supervisar, evaluar y valorar rendimiento y conformidad',
                'pregunta' => '¿Se revisan los informes de evaluación con la dirección?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA01 - Supervisar, evaluar y valorar rendimiento y conformidad',
                'pregunta' => '¿Se actúa con base en los hallazgos de supervisión?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA03 - Supervisar, evaluar y valorar la conformidad con requerimientos externos',
                'pregunta' => '¿Se identifican todos los requisitos regulatorios aplicables?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA03 - Supervisar, evaluar y valorar la conformidad con requerimientos externos',
                'pregunta' => '¿Se evalúa el cumplimiento de los estándares externos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA03 - Supervisar, evaluar y valorar la conformidad con requerimientos externos',
                'pregunta' => '¿Se mantiene evidencia del cumplimiento normativo?',
                'opciones' => [
                    ['texto' => '1 - No existe documentación ni registros.', 'puntaje' => 0],
                    ['texto' => '2 - Existe documentación parcial o no actualizada.', 'puntaje' => 1],
                    ['texto' => '3 - La documentación está actualizada pero no se consulta regularmente.', 'puntaje' => 2],
                    ['texto' => '4 - La documentación está actualizada y se consulta ocasionalmente.', 'puntaje' => 3],
                    ['texto' => '5 - La documentación está actualizada, es accesible y se consulta regularmente.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA03 - Supervisar, evaluar y valorar la conformidad con requerimientos externos',
                'pregunta' => '¿Se revisan los controles frente a nuevas regulaciones?',
                'opciones' => [
                    ['texto' => '1 - No se realiza ninguna revisión o evaluación.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza ocasionalmente sin un calendario definido.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza de forma periódica pero sin seguimiento formal.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza periódicamente y con algunos ajustes.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza sistemáticamente con acciones de mejora concretas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'COBIT',
                'proceso' => 'MEA03 - Supervisar, evaluar y valorar la conformidad con requerimientos externos',
                'pregunta' => '¿Se involucran expertos legales en el proceso de cumplimiento?',
                'opciones' => [
                    ['texto' => '1 - No se consideran requisitos externos.', 'puntaje' => 0],
                    ['texto' => '2 - Se conocen pero no se documentan.', 'puntaje' => 1],
                    ['texto' => '3 - Se documentan pero no se verifica el cumplimiento.', 'puntaje' => 2],
                    ['texto' => '4 - Se verifica el cumplimiento periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Existe un control formal del cumplimiento normativo.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Existen procesos definidos y documentados en toda la organización?',
                'opciones' => [
                    ['texto' => '1 - No existe documentación ni registros.', 'puntaje' => 0],
                    ['texto' => '2 - Existe documentación parcial o no actualizada.', 'puntaje' => 1],
                    ['texto' => '3 - La documentación está actualizada pero no se consulta regularmente.', 'puntaje' => 2],
                    ['texto' => '4 - La documentación está actualizada y se consulta ocasionalmente.', 'puntaje' => 3],
                    ['texto' => '5 - La documentación está actualizada, es accesible y se consulta regularmente.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Los procesos se siguen consistentemente en todos los proyectos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Se miden los resultados de los procesos con métricas establecidas?',
                'opciones' => [
                    ['texto' => '1 - No se utilizan indicadores.', 'puntaje' => 0],
                    ['texto' => '2 - Se usan algunos indicadores sin seguimiento.', 'puntaje' => 1],
                    ['texto' => '3 - Se usan indicadores básicos con seguimiento ocasional.', 'puntaje' => 2],
                    ['texto' => '4 - Los indicadores son revisados periódicamente.', 'puntaje' => 3],
                    ['texto' => '5 - Los indicadores se usan para la toma de decisiones estratégicas.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Se gestionan activamente los recursos y capacidades del equipo?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Se aplican prácticas de mejora continua en los procesos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿La organización actúa proactivamente ante desviaciones en los procesos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Se analizan cuantitativamente los procesos clave?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Se usan los datos para predecir resultados de los procesos?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿Existen mecanismos para adaptar los procesos según los cambios organizacionales?',
                'opciones' => [
                    ['texto' => '1 - No se gestiona el cambio.', 'puntaje' => 0],
                    ['texto' => '2 - El cambio se gestiona informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Existe un proceso de gestión del cambio básico.', 'puntaje' => 2],
                    ['texto' => '4 - Se gestiona el cambio con participación de usuarios.', 'puntaje' => 3],
                    ['texto' => '5 - El proceso de cambio está optimizado y es adaptable.', 'puntaje' => 4],
                ]
            ],
            [
                'marco' => 'CMMI',
                'proceso' => 'Evaluación de Nivel de Madurez',
                'pregunta' => '¿La dirección lidera e impulsa la mejora continua en la organización?',
                'opciones' => [
                    ['texto' => '1 - No se realiza.', 'puntaje' => 0],
                    ['texto' => '2 - Se realiza parcialmente o informalmente.', 'puntaje' => 1],
                    ['texto' => '3 - Se realiza con cierto control.', 'puntaje' => 2],
                    ['texto' => '4 - Se realiza con control formal y seguimiento.', 'puntaje' => 3],
                    ['texto' => '5 - Se realiza de manera óptima y sistematizada.', 'puntaje' => 4],
                ]
            ],
        ];

        foreach ($data as $item) {
            $framework = Framework::firstOrCreate(['name' => $item['marco']]);
            $process = Process::firstOrCreate(['name' => $item['proceso'], 'framework_id' => $framework->id]);
            $question = Question::create(['text' => $item['pregunta'], 'process_id' => $process->id]);

            foreach ($item['opciones'] as $opcion) {
                Option::create([
                    'text' => $opcion['texto'],
                    'score' => $opcion['puntaje'],
                    'question_id' => $question->id,
                ]);
            }
        }
    }
}
