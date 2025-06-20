import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';

export default function CmmiIndex() {
    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'CMMI', href: '/cmmi' }]}>
            <Head title="CMMI" />
            <div className="p-6 space-y-6">
                <h1 className="text-3xl font-bold">CMMI</h1>
                <p className="text-muted-foreground max-w-3xl">
                    CMMI (Capability Maturity Model Integration) es un enfoque para la mejora de procesos que proporciona a las
                    organizaciones los elementos esenciales de procesos efectivos. Su objetivo es mejorar el rendimiento y guiar
                    el desarrollo de capacidades organizacionales a través de niveles de madurez.
                </p>

                <Button asChild>
                    <Link href={route('cmmi.asses')}>
                        Empezar evaluación
                    </Link>
                </Button>
            </div>
        </AppSidebarLayout>
    );
}
