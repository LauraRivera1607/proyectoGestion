import { Head, usePage } from '@inertiajs/react';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { type BreadcrumbItem } from '@/types';
import {
  RadialBarChart,
  RadialBar,
  PolarAngleAxis,
  ResponsiveContainer,
  BarChart,
  Bar,
  XAxis,
  YAxis,
  Tooltip,
} from 'recharts';

interface Cmmi {
  nivel: number;
  created_at: string;
  recomendacion: string;
}

interface CobitEval {
  domain: string;
  percentage: number;
}

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/dashboard' },
];

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
                    <RadialBar dataKey="value" cornerRadius={10} />
                  </RadialBarChart>
                </ResponsiveContainer>
                <div className="absolute inset-0 flex flex-col items-center justify-center">
                  <div className={`text-xl font-bold ${nivelColor[cmmi.nivel]}`}>Nivel {cmmi.nivel}</div>
                  <div className="text-sm text-muted-foreground">{cmmi.recomendacion}</div>
                </div>
              </div>
              <div className="space-y-2">
                <p className="text-sm text-muted-foreground">Fecha: {cmmi.created_at}</p>
              </div>
            </div>
          ) : (
            <p className="text-muted-foreground">Aún no has realizado ninguna evaluación CMMI.</p>
          )}
        </div>

        <div className="rounded-xl border p-6 shadow-sm">
          <h2 className="text-xl font-bold mb-4">Evaluación COBIT por Dominio</h2>
          {cobit.length ? (
            <ResponsiveContainer width="100%" height={300}>
              <BarChart layout="vertical" data={cobit}>
                <XAxis type="number" domain={[0, 100]} hide />
                <YAxis type="category" dataKey="domain" />
                <Tooltip formatter={(value: number) => `${value}%`} />
                <Bar dataKey="percentage" fill="#0f766e" radius={[0, 10, 10, 0]} />
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