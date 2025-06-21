import { Link } from '@inertiajs/react';
import { History, LayoutGrid } from 'lucide-react';

import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Historial',
        href: '/history',
        icon: History,
    },
];

const staticFrameworks = [
    { id: 'cobit', name: 'COBIT' },
    { id: 'cmmi', name: 'CMMI' },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            {/* Encabezado */}
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton asChild>
                            <Link href="/dashboard" prefetch className="text-lg font-bold">
                                Inicio
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            {/* Contenido principal */}
            <SidebarContent>
                <NavMain items={mainNavItems} />

                <SidebarMenu className="mt-6">
                    <span className="px-4 text-xs font-semibold text-muted-foreground uppercase">Marcos</span>
                    {staticFrameworks.map((fw) => (
                        <SidebarMenuItem key={fw.id}>
                            <SidebarMenuButton asChild>
                                <Link href={`/${fw.id}`}>{fw.name}</Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    ))}
                </SidebarMenu>
            </SidebarContent>

            {/* Footer con menú de usuario */}
            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
