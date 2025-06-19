import { Head, usePage } from '@inertiajs/react';
import { RadialBarChart, RadialBar, PolarAngleAxis, ResponsiveContainer } from 'recharts';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { type BreadcrumbItem } from '@/types';

interface Cmmi {
  nivel: number;
  created_at: string;
  recomendacion: string;
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
];

export default function Dashboard() {
    const { props } = usePage<{ cmmi?: Cmmi }>();
    const cmmi = props.cmmi;

    const cmmiData = cmmi ? [{ name: 'Nivel', value: cmmi.nivel * 20 }] : [];

    return (
        <AppSidebarLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />

            <div className="flex flex-col gap-4 p-6">
                <div className="rounded-xl border p-6 shadow-sm">
                    <h2 className="text-xl font-bold mb-4">Evaluación CMMI</h2>

                    {cmmi ? (
                        <div className="flex items-center gap-6">
                            <div className="relative w-[180px] h-[180px]">
                                <ResponsiveContainer width="100%" height="100%">
                                    <RadialBarChart
                                        innerRadius="70%"
                                        outerRadius="100%"
                                        data={cmmiData}
                                        startAngle={90}
                                        endAngle={-270}
                                    >
                                        <PolarAngleAxis type="number" domain={[0, 100]} tick={false} />
                                        <RadialBar
                                            background
                                            dataKey="value"
                                            cornerRadius={10}
                                        />
                                    </RadialBarChart>
                                </ResponsiveContainer>
                                <div className="absolute inset-0 flex items-center justify-center text-2xl font-bold">
                                    Nivel {cmmi.nivel}
                                </div>
                            </div>

                            <div className="space-y-2">
                                <p className="text-sm text-muted-foreground">Última evaluación: {cmmi.created_at}</p>
                                <p className="text-base">{cmmi.recomendacion}</p>
                            </div>
                        </div>
                    ) : (
                        <p className="text-muted-foreground">Aún no has realizado ninguna evaluación CMMI.</p>
                    )}
                </div>
            </div>
        </AppSidebarLayout>
    );
}
