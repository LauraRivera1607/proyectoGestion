import React from 'react';
import { Head } from '@inertiajs/react';
import { Card, CardBody, CardHeader, Divider, Tooltip } from '@heroui/react';
import { Icon } from '@iconify/react';
import {
    BarChart,
    Bar,
    XAxis,
    YAxis,
    Tooltip as BarTooltip,
    ResponsiveContainer,
    RadialBarChart,
    RadialBar,
    PolarAngleAxis,
} from 'recharts';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';

interface Cmmi {
    nivel: number;
    created_at: string;
    recomendacion: string;
}

interface CobitEval {
    domain: string;
    percentage: number;
}

interface DashboardProps {
    cmmi: Cmmi | null;
    cobit: CobitEval[];
}

const nivelColor: Record<number, string> = {
    1: 'danger',
    2: 'warning',
    3: 'primary',
    4: 'success',
    5: 'success',
};

const cobitDescriptions: Record<string, { description: string; processes: string[] }> = {
    'Evaluar, dirigir y monitorear': {
        description: 'Gobierno corporativo de TI.',
        processes: ['EDM01 - Asegurar el establecimiento y mantenimiento del marco de gobierno', 'EDM02 - Asegurar la entrega de beneficios', 'EDM03 - Asegurar la optimización del riesgo', 'EDM04 - Asegurar la optimización de recursos', 'EDM05 - Asegurar la transparencia con las partes interesadas']
    },
    'Alinear, planear y organizar': {
        description: 'Planificación y organización de TI alineadas al negocio.',
        processes: ['APO01 - Gestionar el marco de gestión de TI', 'APO02 - Gestionar la estrategia', 'APO03 - Gestionar la arquitectura empresarial', 'APO04 - Gestionar la innovación', 'APO05 - Gestionar cartera', 'APO06 - Gestionar presupuesto y costos', 'APO07 - Gestionar recursos humanos', 'APO08 - Gestionar relaciones', 'APO09 - Gestionar acuerdos de servicio', 'APO10 - Gestionar proveedores', 'APO11 - Gestionar calidad', 'APO12 - Gestionar riesgos', 'APO13 - Gestionar seguridad']
    },
    'Construir, adquirir e implementar': {
        description: 'Implementación de soluciones de TI y su mantenimiento.',
        processes: ['BAI01 - Gestionar programas y proyectos', 'BAI02 - Gestionar la definición de requisitos', 'BAI03 - Gestionar la identificación y construcción de soluciones', 'BAI04 - Gestionar la disponibilidad y capacidad', 'BAI05 - Gestionar la habilitación de cambios organizacionales', 'BAI06 - Gestionar cambios', 'BAI07 - Gestionar la aceptación y transición de cambios', 'BAI08 - Gestionar el conocimiento', 'BAI09 - Gestionar activos']
    },
    'Entregar, dar servicio y soporte': {
        description: 'Prestación y soporte de servicios de TI.',
        processes: ['DSS01 - Gestionar operaciones', 'DSS02 - Gestionar solicitudes y servicios', 'DSS03 - Gestionar problemas', 'DSS04 - Gestionar la continuidad', 'DSS05 - Gestionar seguridad de servicios', 'DSS06 - Gestionar controles de procesos de negocio']
    },
    'Monitorear, evaluar y valorar': {
        description: 'Monitoreo del desempeño, control interno y cumplimiento.',
        processes: ['MEA01 - Monitorear, evaluar y valorar el desempeño y conformidad', 'MEA02 - Monitorear, evaluar y valorar el sistema de control', 'MEA03 - Monitorear, evaluar y valorar el cumplimiento con requerimientos externos']
    }
};

export default function Dashboard({ cmmi, cobit }: DashboardProps) {
    const cmmiData = cmmi
        ? [
            { name: 'Nivel 1: INICIAL', value: 20, fill: '#FF0000' },
            { name: 'Nivel 2: GESTIONADO', value: 40, fill: '#FFA500' },
            { name: 'Nivel 3: DEFINIDO', value: 60, fill: '#FFFF00' },
            { name: 'Nivel 4: GESTIONADO CUANTITATIVAMENTE', value: 80, fill: '#008000' },
            { name: 'Nivel 5: OPTIMIZADO', value: 100, fill: '#0000FF' },
        ].slice(0, cmmi.nivel)
        : [];

    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'Dashboard', href: '/dashboard' }]}>
            <Head title="Panel de Control" />

            <div className="flex-grow p-4 md:p-8 overflow-auto">
                <div className="grid grid-cols-1 xl:grid-cols-2 gap-6 h-full">
                    <Card className="h-full">
                        <CardHeader className="flex justify-between items-center">
                            <h2 className="text-xl font-semibold">Evaluación CMMI</h2>
                            <Icon icon="lucide:bar-chart-2" className="text-2xl text-primary" />
                        </CardHeader>
                        <Divider />
                        <CardBody className="flex flex-col items-center justify-center gap-6">
                            {cmmi ? (
                                <>
                                    <div className="relative">
                                        <RadialBarChart
                                            width={250}
                                            height={250}
                                            innerRadius="30%"
                                            outerRadius="100%"
                                            data={cmmiData}
                                            startAngle={180}
                                            endAngle={0}
                                        >
                                            <PolarAngleAxis
                                                type="number"
                                                domain={[0, 100]}
                                                angleAxisId={0}
                                                tick={false}
                                            />
                                            <RadialBar
                                                background
                                                dataKey="value"
                                                angleAxisId={0}
                                                data={cmmiData}
                                                cornerRadius={10}
                                            />
                                        </RadialBarChart>
                                    </div>
                                    <div className="flex flex-col items-center text-center">
                                        <span className={`text-4xl font-extrabold text-${nivelColor[cmmi.nivel]}`}>
                                            Nivel {cmmi.nivel}
                                        </span>
                                        <span className="text-sm font-medium text-muted-foreground mt-1 tracking-wide uppercase">
                                            {cmmiData[cmmiData.length - 1].name}
                                        </span>
                                    </div>
                                    <div className="w-full bg-muted rounded-xl p-4 shadow-inner border border-border">
                                        <div className="flex items-start gap-3">
                                            <Icon icon="lucide:info" className="text-xl text-primary mt-1" />
                                            <div>
                                                <p className="font-semibold text-lg text-primary">Recomendación para tu nivel</p>
                                                <p className="text-muted-foreground mt-1 text-sm leading-relaxed">
                                                    {cmmi.recomendacion}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="text-center mt-2">
                                        <p className="font-medium text-foreground-700">Fecha de Evaluación:</p>
                                        <p className="text-sm text-muted-foreground font-medium">{cmmi.created_at}</p>
                                    </div>
                                </>
                            ) : (
                                <p className="text-center text-foreground-500">
                                    Aún no se ha realizado una evaluación CMMI.
                                </p>
                            )}
                        </CardBody>
                    </Card>

                    <Card className="h-full">
                        <CardHeader className="flex justify-between items-center">
                            <h2 className="text-xl font-semibold">Evaluación COBIT por Dominio</h2>
                            <Icon icon="lucide:pie-chart" className="text-2xl text-primary" />
                        </CardHeader>
                        <Divider />
                        <CardBody>
                            {cobit.length ? (
                                <ResponsiveContainer width="100%" height={300}>
                                    <BarChart
                                        data={cobit}
                                        layout="vertical"
                                        margin={{ top: 5, right: 30, left: 20, bottom: 5 }}
                                    >
                                        <XAxis type="number" domain={[0, 100]} />
                                        <YAxis dataKey="domain" type="category" width={180} />
                                        <BarTooltip formatter={(value) => `${value}%`} />
                                        <Bar dataKey="percentage" fill="#006FEE" barSize={20} radius={[0, 4, 4, 0]} />
                                    </BarChart>
                                </ResponsiveContainer>
                            ) : (
                                <p className="text-center text-foreground-500">Aún no se ha realizado una evaluación COBIT.</p>
                            )}
                            <div className="mt-6 space-y-4">
                                {Object.entries(cobitDescriptions).map(([domain, info]) => (
                                    <div key={domain} className="p-4 rounded-lg bg-muted border border-border shadow-sm">
                                        <Tooltip
                                            content={
                                                <ul className="text-sm list-disc pl-4 space-y-1 bg-white shadow-lg p-4 rounded-md border border-border z-50">
                                                    {info.processes.map((proc, i) => (
                                                        <li key={i}>{proc}</li>
                                                    ))}
                                                </ul>
                                            }
                                        >
                                            <p className="font-semibold text-primary cursor-help">{domain}</p>
                                        </Tooltip>
                                        <p className="text-sm text-muted-foreground mt-1 leading-relaxed">{info.description}</p>
                                    </div>
                                ))}
                            </div>
                        </CardBody>
                    </Card>
                </div>
            </div>
        </AppSidebarLayout>
    );
}
