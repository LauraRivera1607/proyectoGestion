import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Link } from '@inertiajs/react';
import { PropsWithChildren } from 'react';

export default function AuthCardLayout({
    children,
    title,
    description,
}: PropsWithChildren<{
    name?: string;
    title?: string;
    description?: string;
}>) {
    return (
        <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-[var(--background)] p-6 md:p-10 dark:bg-[var(--background)]">
            <div className="flex w-full max-w-md flex-col gap-6">
                <Link href={route('home')} className="flex flex-col items-center gap-2 self-center font-medium">
                    <div className="flex items-center justify-center">
                        <img src="/Logo.png" alt="Logo" className="h-16 w-16 object-contain" />
                    </div>
                </Link>

                <div className="flex flex-col gap-6">
                    <Card className="rounded-2xl bg-[var(--card)] text-[var(--foreground)] shadow-md transition-colors dark:bg-[var(--card)] dark:text-[var(--foreground)]">
                        <CardHeader className="px-10 pt-8 pb-0 text-center">
                            <CardTitle className="text-2xl font-semibold text-[var(--primary)] dark:text-[var(--primary)]">{title}</CardTitle>
                            <CardDescription className="text-muted-foreground">{description}</CardDescription>
                        </CardHeader>
                        <CardContent className="px-10 py-8">{children}</CardContent>
                    </Card>
                </div>
            </div>
        </div>
    );
}
