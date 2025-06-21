import { SidebarInset } from '@/components/ui/sidebar';
import * as React from 'react';

interface AppContentProps extends React.ComponentProps<'main'> {
    variant?: 'header' | 'sidebar'; // Determina si se usa SidebarInset o <main> estándar
}

export function AppContent({ variant = 'header', children, ...props }: AppContentProps) {
    // Si el layout usa barra lateral, envolvemos en SidebarInset (define padding/layout interno del sidebar)
    if (variant === 'sidebar') {
        return <SidebarInset {...props}>{children}</SidebarInset>;
    }

    // Caso contrario, usamos layout tradicional centrado con máximo ancho
    return (
        <main className="mx-auto flex h-full w-full max-w-7xl flex-1 flex-col gap-4 rounded-xl" {...props}>
            {children}
        </main>
    );
}
