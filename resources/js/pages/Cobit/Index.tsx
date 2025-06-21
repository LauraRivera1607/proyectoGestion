import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import { Card } from '@/components/ui/card';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { ClipboardIcon, ChevronRightIcon } from '@heroicons/react/24/outline';

const COBIT_DOMAINS = [
    'Evaluar, Dirigir y Monitorizar (EDM)',
    'Alinear, Planificar y Organizar (APO)',
    'Construir, Adquirir e Implementar (BAI)',
    'Entregar, Servir y Dar Soporte (DSS)',
    'Monitorear, Evaluar y Valorar (MEA)',
];

export default function CobitIndex() {
    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'COBIT', href: '/cobit' }]}>
            <Head title="COBIT" />
            <div className="w-full px-4 md:px-8 py-6 space-y-6">
                <div className="flex items-center gap-3">
                    <ClipboardIcon className="h-8 w-8 text-[#3A71B2]" />
                    <h1 className="text-3xl font-bold text-[#3A71B2] w-full">Evaluaciones COBIT</h1>
                </div>

                <p className="text-muted-foreground max-w-screen-lg">
                    COBIT (Control Objectives for Information and Related Technologies) es un marco de gobierno y gestión de TI
                    empresarial. Proporciona principios, prácticas, modelos y herramientas para ayudar a las organizaciones a maximizar
                    el valor de su información a través de la gestión y el gobierno de la tecnología.
                </p>
                <div className="flex flex-col lg:flex-row lg:items-start gap-6 w-full">
                    <Button asChild className="bg-[#3A71B2] hover:bg-[#2C5D96] text-white w-full lg:w-auto">
                        <Link href={route('cobit.allQuestions')}>
                            Evaluar los 5 dominios
                        </Link>
                    </Button>

                    <Popover>
                        <PopoverTrigger asChild>
                            <Button variant="outline" className="w-full lg:w-auto">
                                Evaluar por cada dominio
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent className="w-full max-w-xl shadow-md border border-[#B3CCE6] bg-white dark:bg-[#1f2730]">
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                {COBIT_DOMAINS.map((domain, i) => (
                                    <Card key={i} className="hover:bg-[#E6F0FA] dark:hover:bg-[#253548] transition-all">
                                        <Link
                                            href={`/cobit/evaluar/${i + 1}`}
                                            className="flex items-center justify-between p-3 text-sm font-medium text-gray-800 dark:text-gray-200"
                                        >
                                            <span>{domain}</span>
                                            <ChevronRightIcon className="h-4 w-4" />
                                        </Link>
                                    </Card>
                                ))}
                            </div>
                        </PopoverContent>
                    </Popover>
                </div>
            </div>
        </AppSidebarLayout>
    );
}
