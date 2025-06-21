import { Link } from '@inertiajs/react';
import { type PropsWithChildren } from 'react';

interface AuthLayoutProps {
    name?: string;
    title?: string;
    description?: string;
}

export default function AuthSimpleLayout({ children, title, description }: PropsWithChildren<AuthLayoutProps>) {
    return (
        <div className="flex min-h-screen items-center justify-center bg-gradient-to-b from-[#B23A8A] via-[#C85EB4] to-[#F6C3F0] p-6 md:p-10">
            <div className="w-full max-w-md rounded-2xl bg-white/90 p-8 shadow-2xl backdrop-blur-md dark:bg-[#2b1e29]/90">
                <div className="mb-6 flex flex-col items-center gap-4">
                    <Link href={route('home')} className="flex flex-col items-center gap-1">
                        <div className="flex h-14 w-14 items-center justify-center rounded-full bg-[#B23A8A] shadow-md">
                            <img src="/Logo.png" alt="Logo" className="h-15 w-15" />
                        </div>
                        <span className="sr-only">{title}</span>
                    </Link>

                    <div className="text-center">
                        <h1 className="text-2xl font-bold text-[#B23A8A] dark:text-white">{title}</h1>
                        <p className="mt-1 text-sm text-gray-700 dark:text-gray-300">{description}</p>
                    </div>
                </div>

                <div>{children}</div>
            </div>
        </div>
    );
}
