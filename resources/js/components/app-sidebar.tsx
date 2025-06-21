import { Link } from '@inertiajs/react';
import { History, LayoutGrid, Landmark, TrendingUp } from 'lucide-react';

import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem
} from '@/components/ui/sidebar';
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
    { id: 'cobit', name: 'COBIT', icon: Landmark },
    { id: 'cmmi', name: 'CMMI', icon: TrendingUp },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
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

            <SidebarContent>
                <NavMain items={mainNavItems} />

                <SidebarMenu className="mt-6">
                    <span className="px-4 text-xs font-semibold text-muted-foreground uppercase">Marcos</span>
                    {staticFrameworks.map((fw) => (
                        <SidebarMenuItem key={fw.id}>
                            <SidebarMenuButton asChild>
                                <Link href={`/${fw.id}`} className="flex items-center gap-2">
                                    <fw.icon className="w-4 h-4" />
                                    <span>{fw.name}</span>
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    ))}
                </SidebarMenu>
            </SidebarContent>

            <SidebarFooter>
                <NavUser/>
            </SidebarFooter>
        </Sidebar>
    );
}
