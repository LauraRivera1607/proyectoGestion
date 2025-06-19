import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import { Card } from '@/components/ui/card';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';

const COBIT_DOMAINS = [
    'Evaluar, Dirigir y Monitorizar (EDM)',
    'Alinear, Planificar y Organizar (APO)',
    'Construir, Adquirir e Implementar (BAI)',
    'Entregar, Servir y Dar Soporte (DSS)',
    'Monitorear, Evaluar y Valorar (MEA)',
];

export default function CobitIndex() {
    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'Cobit', href: '/cobit' }]}>
            <Head title="COBIT" />
            <div className="p-6 space-y-6">
                <h1 className="text-3xl font-bold">COBIT</h1>
                <p className="text-muted-foreground max-w-3xl">
                    COBIT (Control Objectives for Information and Related Technologies) es un marco de gobierno y gestión de TI
                    empresarial. Proporciona principios, prácticas, modelos y herramientas para ayudar a las organizaciones a maximizar
                    el valor de su información a través de la gestión y el gobierno de la tecnología.
                </p>

                <div className="flex flex-wrap gap-4">
                    <TooltipProvider>
                        <Tooltip>
                            <TooltipTrigger asChild>
                                <Button asChild>
                                    <Link href="/cobit/evaluar-todo">
                                        Evaluar los 5 dominios
                                    </Link>
                                </Button>
                            </TooltipTrigger>
                            <TooltipContent className="text-sm text-left max-w-xs">
                                <ul className="list-disc pl-4">
                                    {COBIT_DOMAINS.map((domain, i) => (
                                        <li key={i}>{domain}</li>
                                    ))}
                                </ul>
                            </TooltipContent>
                        </Tooltip>
                    </TooltipProvider>
                    <Popover>
                        <PopoverTrigger asChild>
                            <Button variant="outline">
                                Evaluar por cada dominio
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent className="w-72">
                            <div className="space-y-2">
                                {COBIT_DOMAINS.map((domain, i) => (
                                    <Card key={i} className="hover:bg-accent cursor-pointer p-2 transition-all">
                                        <Link href={`/cobit/evaluar/${i + 1}`} className="block w-full">
                                            {domain}
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
