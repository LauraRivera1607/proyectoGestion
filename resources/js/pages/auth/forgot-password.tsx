import { Head, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';

import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/auth-layout';

export default function ForgotPassword({ status }: { status?: string }) {
    const { data, setData, post, processing, errors } = useForm<Required<{ email: string }>>({
        email: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('password.email'));
    };

    return (
        <AuthLayout title="¿Olvidaste tu contraseña?" description="Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.">
            <Head title="Recuperar contraseña" />

            {status && (
                <div className="mb-4 rounded-md bg-green-100 px-4 py-2 text-center text-sm font-medium text-green-700 dark:bg-green-900 dark:text-green-200">
                    {status}
                </div>
            )}

            <div className="space-y-6">
                <form onSubmit={submit}>
                    <div className="grid gap-2">
                        <Label htmlFor="email">Correo electrónico</Label>
                        <Input
                            id="email"
                            type="email"
                            name="email"
                            autoComplete="off"
                            value={data.email}
                            autoFocus
                            onChange={(e) => setData('email', e.target.value)}
                            placeholder="correo@ejemplo.com"
                        />
                        <InputError message={errors.email} />
                    </div>

                    <div className="my-6">
                        <Button className="w-full bg-[#B23A8A] text-white hover:bg-[#C85EB4]" disabled={processing}>
                            {processing && <LoaderCircle className="mr-2 h-4 w-4 animate-spin" />}
                            Enviar enlace de recuperación
                        </Button>
                    </div>
                </form>

                <div className="text-center text-sm text-muted-foreground">
                    <span>¿Ya tienes cuenta?</span>{' '}
                    <TextLink href={route('login')} className="text-[#B23A8A] hover:text-[#C85EB4]">
                        Inicia sesión
                    </TextLink>
                </div>
            </div>
        </AuthLayout>
    );
}
