import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { Bolt, BriefcaseConveyorBelt, LayoutGrid, MessageSquareMoreIcon, ReceiptText, Recycle, User2Icon } from 'lucide-react';
import AppLogo from './app-logo';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        url: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Job Management',
        url: '/v1/job-management/add-resume',
        icon: BriefcaseConveyorBelt,
    },
    {
        title: 'Profile Management',
        url: '/v1/job-management/profile-management',
        icon: User2Icon,
    },
    ,
    {
        title: 'Subsricptions',
        url: '/v1/job-management/billing',
        icon: ReceiptText,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Sync',
        url: '/dashboard/sync',
        icon: Recycle,
    },
    {
        title: 'Feedback',
        url: '/dashboard/feedback',
        icon: MessageSquareMoreIcon,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
