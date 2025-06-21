import { Head, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';

import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import AuthLayout from '@/layouts/auth-layout';

export default function VerifyEmail({ status }: { status?: string }) {
    const { post, processing } = useForm({});

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('verification.send'));
    };

    return (
        <AuthLayout
            title="Verifica tu correo"
            description="Hemos enviado un enlace de verificación a tu correo electrónico. Por favor, revísalo y haz clic para activar tu cuenta."
        >
            <Head title="Verificación de correo" />

            {status === 'verification-link-sent' && (
                <div className="mb-4 rounded-md bg-green-100 px-4 py-2 text-center text-sm font-medium text-green-700 dark:bg-green-900 dark:text-green-200">
                    Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </div>
            )}

            <form onSubmit={submit} className="space-y-6 text-center">
                <Button disabled={processing} className="mx-auto w-full max-w-xs bg-[#B23A8A] text-white hover:bg-[#C85EB4]">
                    {processing && <LoaderCircle className="mr-2 h-4 w-4 animate-spin" />}
                    Reenviar correo de verificación
                </Button>

                <TextLink href={route('logout')} method="post" className="mx-auto block text-sm text-muted-foreground hover:text-foreground">
                    Cerrar sesión
                </TextLink>
            </form>
        </AuthLayout>
    );
}
