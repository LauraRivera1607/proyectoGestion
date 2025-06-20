import React from 'react';
import { Head } from '@inertiajs/react';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';

interface Evaluation {
    id: number;
    framework: string;
    domain: string | null;
    score_total: number;
    nivel: number;
    created_at: string;
}

interface Props {
    framework: string;
    lastCMMI: Evaluation | null;
    lastCobitEvaluations: Evaluation[];
}

const COBIT_DOMAINS = [
    { key: 'EDM', name: 'Evaluar, Dirigir y Monitorizar (EDM)' },
    { key: 'APO', name: 'Alinear, Planificar y Organizar (APO)' },
    { key: 'BAI', name: 'Construir, Adquirir e Implementar (BAI)' },
    { key: 'DSS', name: 'Entregar, Servir y Dar Soporte (DSS)' },
    { key: 'MEA', name: 'Monitorear, Evaluar y Valorar (MEA)' },
];

export default function CobitAllQuestions({ framework, lastCMMI, lastCobitEvaluations }: Props) {
    const formatDate = (dateStr: string) => {
        const date = new Date(dateStr);
        return date.toLocaleDateString('es-ES', {
            day: '2-digit',
            month: 'long',
            year: 'numeric',
        });
    };

    const cobitByDomain = COBIT_DOMAINS.map((domain) => {
        const match = lastCobitEvaluations.find((e) =>
            (e.domain ?? '').toUpperCase().includes(domain.key)
        );
        return {
            name: domain.name,
            nivel: match ? match.nivel : null,
            id: match?.id ?? null,
            created_at: match?.created_at ?? null,
        };
    });

    const hasCobitData = cobitByDomain.some(d => d.nivel !== null);
    const hasCmmiData = lastCMMI !== null;

    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'Historial', href: '/history' }]}>
            <Head title="Historial" />
            <div className="max-w-3xl mx-auto p-6">
                <h1 className="text-2xl font-bold mb-6">HISTORIAL</h1>
                {hasCmmiData ? (
                    <div className="mb-8 border p-4 rounded shadow w-full">
                        <h2 className="text-lg font-semibold text-gray-800 mb-2">CMMI</h2>
                        <p className="text-gray-700">
                            {formatDate(lastCMMI.created_at)}{' '}
                            <span className="ml-4 font-semibold">NIVEL {lastCMMI.nivel}</span>
                            <a
                                href={`/cmmi/report/${lastCMMI.id}`}
                                className="ml-6 text-blue-600 underline"
                            >
                                Ver reporte
                            </a>
                        </p>
                    </div>
                ) : (
                    <div className="mb-8 border p-4 rounded shadow w-full">
                        <h2 className="text-lg font-semibold text-gray-800 mb-2">CMMI</h2>
                        <p className="text-muted-foreground">Aún no has realizado ninguna evaluación CMMI.</p>
                    </div>
                )}
                <div className="border p-4 rounded shadow">
                    <h2 className="text-lg font-semibold text-gray-800 mb-2">COBIT</h2>

                    {hasCobitData ? (
                        <>
                            <p className="text-gray-700">
                                {formatDate(cobitByDomain.find(d => d.id !== null)?.created_at ?? '')}
                                <a
                                    href={`/cobit/report/${lastCobitEvaluations[0].id}`}
                                    className="ml-6 text-blue-600 underline"
                                >
                                    Ver reporte
                                </a>
                            </p>

                            <ul className="mt-4 space-y-1 text-gray-700">
                                {cobitByDomain.map((domain, idx) => (
                                    <li key={idx} className="flex justify-between">
                                        <span>{domain.name}</span>
                                        <span>{domain.nivel !== null ? `${domain.nivel}%` : 'Sin evaluar'}</span>
                                    </li>
                                ))}
                            </ul>
                        </>
                    ) : (
                        <p className="text-muted-foreground">Aún no has realizado ninguna evaluación COBIT.</p>
                    )}
                </div>
            </div>
        </AppSidebarLayout>
    );
}
