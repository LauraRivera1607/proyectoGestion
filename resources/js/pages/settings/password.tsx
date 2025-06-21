import InputError from '@/components/input-error';
import AppLayout from '@/layouts/app-layout';
import SettingsLayout from '@/layouts/settings/layout';
import { type BreadcrumbItem } from '@/types';
import { Transition } from '@headlessui/react';
import { Head, useForm } from '@inertiajs/react';
import { FormEventHandler, useRef } from 'react';
import HeadingSmall from '@/components/heading-small';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { LoaderCircle } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Configuración de contraseña',
        href: '/settings/password',
    },
];

export default function Password() {
    const passwordInput = useRef<HTMLInputElement>(null);
    const currentPasswordInput = useRef<HTMLInputElement>(null);

    const { data, setData, errors, put, reset, processing, recentlySuccessful } = useForm({
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const updatePassword: FormEventHandler = (e) => {
        e.preventDefault();

        put(route('password.update'), {
            preserveScroll: true,
            onSuccess: () => reset(),
            onError: (errors) => {
                if (errors.password) {
                    reset('password', 'password_confirmation');
                    passwordInput.current?.focus();
                }

                if (errors.current_password) {
                    reset('current_password');
                    currentPasswordInput.current?.focus();
                }
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Configuración de contraseña" />

            <SettingsLayout>
                <div className="space-y-6">
                    <HeadingSmall title="Actualizar contraseña" description="Usa una contraseña larga y aleatoria para mantener tu cuenta segura" />

                    <form
                        onSubmit={updatePassword}
                        className="space-y-6 rounded-xl border border-[#C85EB4]/30 bg-white/80 p-6 shadow-md dark:border-[#F6C3F0]/20 dark:bg-[#2b002c]"
                    >
                        <div className="grid gap-2">
                            <Label htmlFor="current_password" className="text-[#B23A8A]">
                                Contraseña actual
                            </Label>

                            <Input
                                id="current_password"
                                ref={currentPasswordInput}
                                value={data.current_password}
                                onChange={(e) => setData('current_password', e.target.value)}
                                type="password"
                                autoComplete="current-password"
                                placeholder="••••••••"
                            />

                            <InputError message={errors.current_password} className="mt-1" />
                        </div>

                        <div className="grid gap-2">
                            <Label htmlFor="password" className="text-[#B23A8A]">
                                Nueva contraseña
                            </Label>

                            <Input
                                id="password"
                                ref={passwordInput}
                                value={data.password}
                                onChange={(e) => setData('password', e.target.value)}
                                type="password"
                                autoComplete="new-password"
                                placeholder="••••••••"
                            />

                            <InputError message={errors.password} className="mt-1" />
                        </div>

                        <div className="grid gap-2">
                            <Label htmlFor="password_confirmation" className="text-[#B23A8A]">
                                Confirmar nueva contraseña
                            </Label>

                            <Input
                                id="password_confirmation"
                                value={data.password_confirmation}
                                onChange={(e) => setData('password_confirmation', e.target.value)}
                                type="password"
                                autoComplete="new-password"
                                placeholder="••••••••"
                            />

                            <InputError message={errors.password_confirmation} className="mt-1" />
                        </div>

                        <div className="flex items-center gap-4">
                            <Button disabled={processing}>
                                {processing && (
                                    <span className="mr-2 animate-spin">
                                        <LoaderCircle className="h-4 w-4" />
                                    </span>
                                )}
                                Guardar contraseña
                            </Button>

                            <Transition
                                show={recentlySuccessful}
                                enter="transition-opacity duration-300"
                                enterFrom="opacity-0"
                                leave="transition-opacity duration-300"
                                leaveTo="opacity-0"
                            >
                                <p className="text-sm text-[#C85EB4]">¡Contraseña actualizada!</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </SettingsLayout>
        </AppLayout>
    );
}
