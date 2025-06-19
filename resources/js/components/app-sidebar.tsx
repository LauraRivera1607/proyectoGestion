import { Link } from '@inertiajs/react';
import { LayoutGrid } from 'lucide-react';

import { NavUser } from '@/components/nav-user';
import { NavMain } from '@/components/nav-main';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { type NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
];

const staticFrameworks = [
    { id: 'cobit', name: 'COBIT' },
    { id: 'cmmi', name: 'CMMI' },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton asChild>
                            <Link href="/dashboard" prefetch>
                                <span className="text-lg font-bold">Inicio</span>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
                <SidebarMenu className="mt-6">
                    <span className="px-4 text-xs font-semibold text-muted-foreground uppercase">Marcos</span>
                    {staticFrameworks.map(fw => (
                        <SidebarMenuItem key={fw.id}>
                            <SidebarMenuButton asChild>
                                <Link href={`/${fw.id}`}>
                                    {fw.name}
                                </Link>
                            </SidebarMenuButton>
                        </SidebarMenuItem>
                    ))}
                </SidebarMenu>
            </SidebarContent>

            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
