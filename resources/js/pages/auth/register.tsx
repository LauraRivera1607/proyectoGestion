import { Head, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';

import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/auth-layout';

type RegisterForm = {
    name: string;
    email: string;
    password: string;
    password_confirmation: string;
};

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm<Required<RegisterForm>>({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('register'), {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    return (
        <AuthLayout title="Crea una cuenta" description="Llena los siguientes campos para registrarte y comenzar">
            <Head title="Registro" />
            <form onSubmit={submit} className="flex flex-col gap-6 rounded-xl bg-white/80 p-8 shadow-xl backdrop-blur-lg dark:bg-[#2b1e29]/90">
                <div className="grid gap-6">
                    {/* Nombre */}
                    <div className="grid gap-2">
                        <Label htmlFor="name" className="text-[#B23A8A]">
                            Nombre completo
                        </Label>
                        <Input
                            id="name"
                            type="text"
                            required
                            autoFocus
                            tabIndex={1}
                            autoComplete="name"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            disabled={processing}
                            placeholder="Ej. Cecilia Corona"
                        />
                        <InputError message={errors.name} className="mt-2" />
                    </div>

                    {/* Correo */}
                    <div className="grid gap-2">
                        <Label htmlFor="email" className="text-[#B23A8A]">
                            Correo electrónico
                        </Label>
                        <Input
                            id="email"
                            type="email"
                            required
                            tabIndex={2}
                            autoComplete="email"
                            value={data.email}
                            onChange={(e) => setData('email', e.target.value)}
                            disabled={processing}
                            placeholder="ejemplo@correo.com"
                        />
                        <InputError message={errors.email} />
                    </div>

                    {/* Contraseña */}
                    <div className="grid gap-2">
                        <Label htmlFor="password" className="text-[#B23A8A]">
                            Contraseña
                        </Label>
                        <Input
                            id="password"
                            type="password"
                            required
                            tabIndex={3}
                            autoComplete="new-password"
                            value={data.password}
                            onChange={(e) => setData('password', e.target.value)}
                            disabled={processing}
                            placeholder="••••••••"
                        />
                        <InputError message={errors.password} />
                    </div>

                    {/* Confirmar contraseña */}
                    <div className="grid gap-2">
                        <Label htmlFor="password_confirmation" className="text-[#B23A8A]">
                            Confirmar contraseña
                        </Label>
                        <Input
                            id="password_confirmation"
                            type="password"
                            required
                            tabIndex={4}
                            autoComplete="new-password"
                            value={data.password_confirmation}
                            onChange={(e) => setData('password_confirmation', e.target.value)}
                            disabled={processing}
                            placeholder="••••••••"
                        />
                        <InputError message={errors.password_confirmation} />
                    </div>

                    {/* Botón */}
                    <Button
                        type="submit"
                        tabIndex={5}
                        disabled={processing}
                        className="mt-2 w-full rounded-full bg-[#B23A8A] text-white transition hover:bg-[#a3307b]"
                    >
                        {processing ? (
                            <span className="flex items-center justify-center gap-2">
                                <LoaderCircle className="h-4 w-4 animate-spin" />
                                Creando...
                            </span>
                        ) : (
                            'Crear cuenta'
                        )}
                    </Button>
                </div>

                {/* Link a login */}
                <div className="text-center text-sm text-gray-600 dark:text-gray-300">
                    ¿Ya tienes una cuenta?{' '}
                    <TextLink href={route('login')} tabIndex={6} className="text-[#B23A8A] hover:underline">
                        Inicia sesión
                    </TextLink>
                </div>
            </form>
        </AuthLayout>
    );
}
