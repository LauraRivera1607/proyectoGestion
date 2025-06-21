import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { Head } from '@inertiajs/react';

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
        const match = lastCobitEvaluations.find((e) => (e.domain ?? '').toUpperCase().includes(domain.key));
        return {
            name: domain.name,
            nivel: match ? match.nivel : null,
            id: match?.id ?? null,
            created_at: match?.created_at ?? null,
        };
    });

    const hasCobitData = cobitByDomain.some((d) => d.nivel !== null);
    const hasCmmiData = lastCMMI !== null;

    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'Historial', href: '/history' }]}>
            <Head title="Historial" />
            <div className="mx-auto max-w-3xl space-y-8 p-6">
                <h1 className="text-3xl font-bold text-[#B23A8A]">Historial de Evaluaciones</h1>

                <div className="rounded-xl border border-[#C85EB4]/40 bg-white p-6 shadow dark:border-[#C85EB4]/30 dark:bg-[#1f0d1e]">
                    <h2 className="mb-3 text-xl font-semibold text-[#B23A8A]">CMMI</h2>
                    {hasCmmiData ? (
                        <div className="space-y-2 text-gray-700 dark:text-gray-300">
                            <p>
                                <span className="font-medium">Fecha:</span> {formatDate(lastCMMI.created_at)}
                            </p>
                            <p>
                                <span className="font-medium">Nivel alcanzado:</span> Nivel {lastCMMI.nivel}
                            </p>
                            <a
                                href={`/cmmi/report/${lastCMMI.id}`}
                                className="mt-2 inline-block text-sm text-[#C85EB4] underline transition hover:text-[#B23A8A]"
                            >
                                Ver reporte completo →
                            </a>
                        </div>
                    ) : (
                        <p className="text-muted-foreground">Aún no has realizado ninguna evaluación CMMI.</p>
                    )}
                </div>

                <div className="rounded-xl border border-[#C85EB4]/40 bg-white p-6 shadow dark:border-[#C85EB4]/30 dark:bg-[#1f0d1e]">
                    <h2 className="mb-3 text-xl font-semibold text-[#B23A8A]">COBIT</h2>
                    {hasCobitData ? (
                        <>
                            <p className="text-gray-700 dark:text-gray-300">
                                <span className="font-medium">Última evaluación:</span>{' '}
                                {formatDate(cobitByDomain.find((d) => d.id !== null)?.created_at ?? '')}
                            </p>
                            <a
                                href={`/cobit/report/${lastCobitEvaluations[0].id}`}
                                className="mt-2 inline-block text-sm text-[#C85EB4] underline transition hover:text-[#B23A8A]"
                            >
                                Ver reporte completo →
                            </a>

                            <ul className="mt-4 divide-y divide-[#F6C3F0]/30">
                                {cobitByDomain.map((domain, idx) => (
                                    <li key={idx} className="flex justify-between py-2 text-gray-700 dark:text-gray-300">
                                        <span>{domain.name}</span>
                                        <span className="font-medium">{domain.nivel !== null ? `${domain.nivel}%` : 'Sin evaluar'}</span>
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
