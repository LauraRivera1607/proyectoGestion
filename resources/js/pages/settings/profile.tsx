import { type BreadcrumbItem, type SharedData } from '@/types';
import { Transition } from '@headlessui/react';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { FormEventHandler } from 'react';

import DeleteUser from '@/components/delete-user';
import HeadingSmall from '@/components/heading-small';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { LoaderCircle } from 'lucide-react';
import AppLayout from '@/layouts/app-layout';
import SettingsLayout from '@/layouts/settings/layout';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Configuración de perfil',
        href: '/settings/profile',
    },
];

type ProfileForm = {
    name: string;
    email: string;
};

export default function Profile({ mustVerifyEmail, status }: { mustVerifyEmail: boolean; status?: string }) {
    const { auth } = usePage<SharedData>().props;

    const { data, setData, patch, errors, processing, recentlySuccessful } = useForm<Required<ProfileForm>>({
        name: auth.user.name,
        email: auth.user.email,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        patch(route('profile.update'), {
            preserveScroll: true,
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Configuración de perfil" />

            <SettingsLayout>
                <div className="space-y-6">
                    <HeadingSmall title="Información del perfil" description="Actualiza tu nombre y dirección de correo electrónico" />

                    <form
                        onSubmit={submit}
                        className="space-y-6 rounded-xl border border-[#C85EB4]/30 bg-white/80 p-6 shadow-md dark:border-[#F6C3F0]/20 dark:bg-[#2b002c]"
                    >
                        <div className="grid gap-2">
                            <Label htmlFor="name" className="text-[#B23A8A]">
                                Nombre completo
                            </Label>
                            <Input
                                id="name"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                required
                                autoComplete="name"
                                placeholder="Tu nombre"
                            />
                            <InputError className="mt-1" message={errors.name} />
                        </div>

                        <div className="grid gap-2">
                            <Label htmlFor="email" className="text-[#B23A8A]">
                                Correo electrónico
                            </Label>
                            <Input
                                id="email"
                                type="email"
                                value={data.email}
                                onChange={(e) => setData('email', e.target.value)}
                                required
                                autoComplete="username"
                                placeholder="tucorreo@ejemplo.com"
                            />
                            <InputError className="mt-1" message={errors.email} />
                        </div>

                        {mustVerifyEmail && auth.user.email_verified_at === null && (
                            <div className="text-sm">
                                <p className="text-[#C85EB4]">
                                    Tu correo electrónico no está verificado.{' '}
                                    <Link
                                        href={route('verification.send')}
                                        method="post"
                                        as="button"
                                        className="underline underline-offset-4 transition hover:text-[#B23A8A]"
                                    >
                                        Haz clic aquí para reenviar el enlace de verificación.
                                    </Link>
                                </p>

                                {status === 'verification-link-sent' && (
                                    <p className="mt-2 font-medium text-green-600">Se ha enviado un nuevo enlace de verificación.</p>
                                )}
                            </div>
                        )}

                        <div className="flex items-center gap-4">
                            <Button disabled={processing}>
                                {processing && (
                                    <span className="mr-2 animate-spin">
                                        <LoaderCircle className="h-4 w-4" />
                                    </span>
                                )}
                                Guardar cambios
                            </Button>

                            <Transition
                                show={recentlySuccessful}
                                enter="transition-opacity duration-300"
                                enterFrom="opacity-0"
                                leave="transition-opacity duration-300"
                                leaveTo="opacity-0"
                            >
                                <p className="text-sm text-[#C85EB4]">¡Guardado exitosamente!</p>
                            </Transition>
                        </div>
                    </form>

                    <div className="mt-6">
                        <DeleteUser />
                    </div>
                </div>
            </SettingsLayout>
        </AppLayout>
    );
}
