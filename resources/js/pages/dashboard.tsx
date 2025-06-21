import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/react';
import { Bar, BarChart, PolarAngleAxis, RadialBar, RadialBarChart, ResponsiveContainer, Tooltip, XAxis, YAxis } from 'recharts';

interface Cmmi {
    nivel: number;
    created_at: string;
    recomendacion: string;
}

interface CobitEval {
    domain: string;
    percentage: number;
}

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Dashboard', href: '/dashboard' }];

export default function Dashboard() {
    const { props } = usePage<{ cmmi?: Cmmi; cobit: CobitEval[] }>();
    const cmmi = props.cmmi;
    const cobit = props.cobit || [];

    const cmmiData = cmmi ? [{ name: 'Nivel', value: cmmi.nivel * 20 }] : [];

    const nivelColor: Record<number, string> = {
        1: 'text-red-600',
        2: 'text-orange-500',
        3: 'text-yellow-500',
        4: 'text-green-600',
        5: 'text-emerald-600',
    };

    return (
        <AppSidebarLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />

            <div className="flex flex-col gap-6 p-6">
                {/* CMMI Section */}
                <div className="rounded-xl border border-[#C85EB4]/40 bg-white/80 p-6 shadow-md dark:border-[#F6C3F0]/20 dark:bg-[#2b002c] dark:shadow-lg">
                    <h2 className="mb-4 text-xl font-bold text-[#B23A8A] dark:text-[#F6C3F0]">Evaluación CMMI</h2>
                    {cmmi ? (
                        <div className="flex flex-col items-center gap-6 sm:flex-row">
                            <div className="relative h-[180px] w-[180px]">
                                <ResponsiveContainer width="100%" height="100%">
                                    <RadialBarChart innerRadius="70%" outerRadius="100%" data={cmmiData} startAngle={90} endAngle={-270}>
                                        <PolarAngleAxis type="number" domain={[0, 100]} tick={false} />
                                        <RadialBar dataKey="value" cornerRadius={10} fill="#B23A8A" />
                                    </RadialBarChart>
                                </ResponsiveContainer>
                                <div className="absolute inset-0 flex flex-col items-center justify-center">
                                    <div className={`text-2xl font-bold ${nivelColor[cmmi.nivel]}`}>Nivel {cmmi.nivel}</div>
                                    <div className="px-2 text-center text-sm text-muted-foreground">{cmmi.recomendacion}</div>
                                </div>
                            </div>
                            <div className="text-center text-sm text-muted-foreground sm:text-left">
                                <p className="font-medium">Fecha de evaluación:</p>
                                <p>{cmmi.created_at}</p>
                            </div>
                        </div>
                    ) : (
                        <p className="text-muted-foreground">Aún no has realizado ninguna evaluación CMMI.</p>
                    )}
                </div>

                {/* COBIT Section */}
                <div className="rounded-xl border border-[#C85EB4]/40 bg-white/80 p-6 shadow-md dark:border-[#F6C3F0]/20 dark:bg-[#2b002c] dark:shadow-lg">
                    <h2 className="mb-4 text-xl font-bold text-[#B23A8A] dark:text-[#F6C3F0]">Evaluación COBIT por Dominio</h2>
                    {cobit.length ? (
                        <ResponsiveContainer width="100%" height={300}>
                            <BarChart layout="vertical" data={cobit}>
                                <XAxis type="number" domain={[0, 100]} hide />
                                <YAxis type="category" dataKey="domain" />
                                <Tooltip formatter={(value: number) => `${value}%`} />
                                <Bar dataKey="percentage" fill="#C85EB4" radius={[0, 10, 10, 0]} />
                            </BarChart>
                        </ResponsiveContainer>
                    ) : (
                        <p className="text-muted-foreground">Aún no has realizado ninguna evaluación COBIT.</p>
                    )}
                </div>
            </div>
        </AppSidebarLayout>
    );
}
