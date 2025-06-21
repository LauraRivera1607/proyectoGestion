import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { Head } from '@inertiajs/react';
import { Disclosure } from '@headlessui/react';
import { ArrowRightIcon, DocumentTextIcon } from '@heroicons/react/24/outline';

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
            <div className="w-full container px-4 md:px-8 space-y-10 py-6">
                <h1 className="text-4xl font-bold text-[#B23A8A] w-full">Historial de Evaluaciones</h1>

                <section className="w-full rounded-xl border border-[#C85EB4]/30 bg-white p-6 shadow dark:bg-[#1f0d1e] dark:border-[#C85EB4]/20">
                    <div className="flex items-center justify-between">
                        <h2 className="text-2xl font-semibold text-[#B23A8A]">CMMI</h2>
                        {hasCmmiData && (
                            <a
                                href={`/cmmi/report/${lastCMMI!.id}`}
                                className="inline-flex items-center gap-1 text-sm text-[#C85EB4] underline hover:text-[#B23A8A]"
                            >
                                <DocumentTextIcon className="h-4 w-4" />
                                Ver reporte
                            </a>
                        )}
                    </div>
                    {hasCmmiData ? (
                        <div className="mt-3 text-gray-700 dark:text-gray-300">
                            <p><span className="font-medium">Fecha:</span> {formatDate(lastCMMI!.created_at)}</p>
                            <p><span className="font-medium">Nivel alcanzado:</span> Nivel {lastCMMI!.nivel}</p>
                        </div>
                    ) : (
                        <p className="text-muted-foreground mt-3">Aún no has realizado ninguna evaluación CMMI.</p>
                    )}
                </section>

                <section className="w-full rounded-xl border border-[#C85EB4]/30 bg-white p-6 shadow dark:bg-[#1f0d1e] dark:border-[#C85EB4]/20">
                    <div className="flex items-center justify-between">
                        <h2 className="text-2xl font-semibold text-[#B23A8A]">COBIT</h2>
                        {hasCobitData && (
                            <a
                                href={`/cobit/report/${lastCobitEvaluations[0].id}`}
                                className="inline-flex items-center gap-1 text-sm text-[#C85EB4] underline hover:text-[#B23A8A]"
                            >
                                <DocumentTextIcon className="h-4 w-4" />
                                Ver reporte
                            </a>
                        )}
                    </div>

                    {hasCobitData ? (
                        <div className="mt-4 space-y-3">
                            <p className="text-gray-700 dark:text-gray-300">
                                <span className="font-medium">Última evaluación:</span>{' '}
                                {formatDate(cobitByDomain.find((d) => d.id !== null)?.created_at ?? '')}
                            </p>

                            <div className="mt-4 space-y-2">
                                {cobitByDomain.map((domain, idx) => (
                                    <Disclosure key={idx}>
                                        {({ open }) => (
                                            <div className="rounded-lg border border-[#F6C3F0]/40 bg-[#fff0fb] px-4 py-3 dark:bg-[#2a142b]">
                                                <Disclosure.Button className="flex w-full justify-between items-center text-left text-sm font-medium text-[#B23A8A] hover:text-[#8f2d71]">
                                                    <span>{domain.name}</span>
                                                    <span
                                                        className={`text-sm font-bold rounded-full px-3 py-1 ${
                                                            domain.nivel !== null
                                                                ? 'bg-[#B23A8A]/10 text-[#B23A8A]'
                                                                : 'bg-gray-200 text-gray-500 dark:bg-gray-700 dark:text-gray-400'
                                                        }`}
                                                    >
                                                        {domain.nivel !== null ? `${domain.nivel}%` : 'Sin evaluar'}
                                                    </span>
                                                </Disclosure.Button>
                                                {domain.id && (
                                                    <Disclosure.Panel className="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                                        <a
                                                            href={`/cobit/report/${domain.id}`}
                                                            className="inline-flex items-center gap-1 text-[#C85EB4] underline hover:text-[#B23A8A]"
                                                        >
                                                            <ArrowRightIcon className="h-4 w-4" />
                                                            Ver reporte por dominio
                                                        </a>
                                                    </Disclosure.Panel>
                                                )}
                                            </div>
                                        )}
                                    </Disclosure>
                                ))}
                            </div>
                        </div>
                    ) : (
                        <p className="mt-4 text-muted-foreground">Aún no has realizado ninguna evaluación COBIT.</p>
                    )}
                </section>
            </div>
        </AppSidebarLayout>
    );
}
