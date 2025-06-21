import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { useAppearance } from '@/hooks/use-appearance';
import { Monitor, Moon, Sun } from 'lucide-react';
import { HTMLAttributes } from 'react';

export default function AppearanceToggleDropdown({ className = '', ...props }: HTMLAttributes<HTMLDivElement>) {
    const { appearance, updateAppearance } = useAppearance();

    const appearanceOptions = [
        {
            value: 'light',
            label: 'Light',
            icon: <Sun className="h-5 w-5" />,
        },
        {
            value: 'dark',
            label: 'Dark',
            icon: <Moon className="h-5 w-5" />,
        },
        {
            value: 'system',
            label: 'System',
            icon: <Monitor className="h-5 w-5" />,
        },
    ];

    const getCurrentIcon = () => {
        return appearanceOptions.find((opt) => opt.value === appearance)?.icon ?? <Monitor className="h-5 w-5" />;
    };

    return (
        <div className={className} {...props}>
            <DropdownMenu>
                <DropdownMenuTrigger asChild>
                    <Button variant="ghost" size="icon" className="h-9 w-9 rounded-md">
                        {getCurrentIcon()}
                        <span className="sr-only">Toggle theme</span>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end">
                    {appearanceOptions.map((opt) => (
                        <DropdownMenuItem key={opt.value} onClick={() => updateAppearance(opt.value as 'light' | 'dark' | 'system')}>
                            <span className="flex items-center gap-2">
                                {opt.icon}
                                {opt.label}
                            </span>
                        </DropdownMenuItem>
                    ))}
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    );
}
