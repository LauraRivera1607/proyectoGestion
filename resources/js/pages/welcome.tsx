import { Head, Link, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';

export default function LoginPage() {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('login'));
    };

    return (
        <div className="flex min-h-screen items-center justify-center bg-gradient-to-b from-[#B23A8A] via-[#C85EB4] to-[#F6C3F0]">
            <Head title="Iniciar Sesión" />

            <div className="flex w-full max-w-5xl overflow-hidden rounded-lg bg-white shadow-xl">
                {/* Lado izquierdo */}
                <div className="hidden w-1/2 flex-col items-center justify-center bg-[#B23A8A] p-10 text-white lg:flex">
                    <img src="/Logo.png" alt="Logo" className="mb-3 h-28 w-28" />
                    <h2 className="text-4xl font-bold">¡Hola!</h2>
                    <p className="mt-3 text-center text-sm leading-relaxed text-white/80">Bienvenido, inicia sesión con tus redes o con tu cuenta</p>

                    <div className="mt-6 flex gap-4">
                        <button className="flex items-center gap-2 rounded-full bg-[#4267B2] px-4 py-2 text-white hover:opacity-90">
                            <span className="fab fa-facebook-f" /> Facebook
                        </button>
                        <button className="flex items-center gap-2 rounded-full bg-[#1DA1F2] px-4 py-2 text-white hover:opacity-90">
                            <span className="fab fa-twitter" /> Twitter
                        </button>
                    </div>
                </div>

                {/* Lado derecho */}
                <div className="w-full p-10 lg:w-1/2">
                    <h2 className="mb-6 text-3xl font-bold text-[#B23A8A]">Iniciar Sesión</h2>

                    <form onSubmit={submit}>
                        <div className="mb-4">
                            <label className="block text-sm font-medium text-gray-700">Correo electrónico</label>
                            <input
                                type="email"
                                name="email"
                                value={data.email}
                                onChange={(e) => setData('email', e.target.value)}
                                required
                                className="mt-1 w-full border-b border-[#C85EB4] bg-transparent py-2 text-gray-800 focus:border-[#B23A8A] focus:outline-none"
                                placeholder="ejemplo@correo.com"
                            />
                            {errors.email && <p className="mt-1 text-sm text-red-600">{errors.email}</p>}
                        </div>

                        <div className="mb-6">
                            <label className="block text-sm font-medium text-gray-700">Contraseña</label>
                            <input
                                type="password"
                                name="password"
                                value={data.password}
                                onChange={(e) => setData('password', e.target.value)}
                                required
                                className="mt-1 w-full border-b border-[#C85EB4] bg-transparent py-2 text-gray-800 focus:border-[#B23A8A] focus:outline-none"
                                placeholder="••••••••"
                            />
                            {errors.password && <p className="mt-1 text-sm text-red-600">{errors.password}</p>}
                        </div>

                        <button
                            type="submit"
                            disabled={processing}
                            className="w-full rounded-full bg-[#B23A8A] px-6 py-2 text-white transition hover:bg-[#a3307b]"
                        >
                            {processing ? (
                                <span className="flex items-center justify-center gap-2">
                                    <LoaderCircle className="h-4 w-4 animate-spin" />
                                    Iniciando...
                                </span>
                            ) : (
                                'Iniciar sesión'
                            )}
                        </button>
                    </form>

                    <p className="mt-6 text-center text-sm text-gray-700">
                        ¿No tienes cuenta?
                        <Link href={route('register')} className="ml-2 text-[#B23A8A] hover:underline">
                            Regístrate
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    );
}
