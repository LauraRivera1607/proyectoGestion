import { SidebarProvider } from '@/components/ui/sidebar';
import { SharedData } from '@/types';
import { usePage } from '@inertiajs/react';

interface AppShellProps {
    children: React.ReactNode;
    variant?: 'header' | 'sidebar'; // por defecto: "header"
}

export function AppShell({ children, variant = 'header' }: AppShellProps) {
    // Accedemos al estado inicial del sidebar desde los props compartidos
    const isOpen = usePage<SharedData>().props.sidebarOpen;

    // Si el diseño es tipo "header", simplemente renderizamos los hijos en un contenedor vertical
    if (variant === 'header') {
        return <div className="flex min-h-screen w-full flex-col">{children}</div>;
    }

    // Si es tipo "sidebar", envolvemos el contenido con SidebarProvider para gestionar su estado
    return <SidebarProvider defaultOpen={isOpen}>{children}</SidebarProvider>;
}
