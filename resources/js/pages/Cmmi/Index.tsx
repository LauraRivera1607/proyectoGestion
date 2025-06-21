import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { ClipboardIcon } from '@heroicons/react/24/outline';

export default function CmmiIndex() {
    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'CMMI', href: '/cmmi' }]}>
            <Head title="CMMI" />
            <div className="w-full px-4 md:px-8 py-6 space-y-6">
                <div className="flex items-center gap-3">
                    <ClipboardIcon className="h-8 w-8 text-[#3A71B2]" />
                    <h1 className="text-3xl font-bold text-[#3A71B2] w-full">Evaluación CMMI</h1>
                </div>
                <p className="text-muted-foreground max-w-screen-lg">
                    CMMI (Capability Maturity Model Integration) es un enfoque para la mejora de procesos que proporciona a las
                    organizaciones los elementos esenciales de procesos efectivos. Su objetivo es mejorar el rendimiento y guiar
                    el desarrollo de capacidades organizacionales a través de niveles de madurez.
                </p>
                <div className="pt-2">
                    <Button asChild className="bg-[#5E8FC8] hover:bg-[#3A71B2] text-white">
                        <Link href={route('cmmi.asses')}>
                            Empezar evaluación
                        </Link>
                    </Button>
                </div>
            </div>
        </AppSidebarLayout>
    );
}
