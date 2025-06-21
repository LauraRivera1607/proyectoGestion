import { type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { type PropsWithChildren } from 'react';

interface AuthLayoutProps {
    title?: string;
    description?: string;
}

export default function AuthSplitLayout({ children, title, description }: PropsWithChildren<AuthLayoutProps>) {
    const { name, quote } = usePage<SharedData>().props;

    return (
        <div className="relative grid h-dvh flex-col items-center justify-center bg-background px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            {/* Lado izquierdo con fondo personalizado */}
            <div className="relative hidden h-full flex-col bg-[#B23A8A] p-10 text-white lg:flex dark:border-r dark:bg-[#C85EB4]">
                <div className="absolute inset-0 opacity-95" />
                <Link href={route('home')} className="relative z-20 flex items-center gap-2 text-lg font-semibold">
                    <img src="/Logo.png" alt="Logo" className="h-10 w-10" />
                    <span>{name}</span>
                </Link>
                {quote && (
                    <div className="relative z-20 mt-auto">
                        <blockquote className="space-y-2">
                            <p className="text-lg leading-relaxed font-light text-white/90">“{quote.message}”</p>
                            <footer className="text-sm text-white/70">– {quote.author}</footer>
                        </blockquote>
                    </div>
                )}
            </div>

            {/* Lado derecho: formulario */}
            <div className="w-full bg-white lg:p-8 dark:bg-zinc-900">
                <div className="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    {/* Logo para pantallas pequeñas */}
                    <Link href={route('home')} className="relative z-20 flex items-center justify-center lg:hidden">
                        <img src="/Logo.png" alt="Logo" className="h-10 w-10 sm:h-12 sm:w-12" />
                    </Link>

                    <div className="flex flex-col items-start gap-2 text-left sm:items-center sm:text-center">
                        <h1 className="text-xl font-bold text-[#B23A8A] dark:text-[#F6C3F0]">{title}</h1>
                        <p className="text-sm text-muted-foreground">{description}</p>
                    </div>

                    {children}
                </div>
            </div>
        </div>
    );
}
