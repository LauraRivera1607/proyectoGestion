import { Head, router } from '@inertiajs/react';
import { useState } from 'react';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { Button } from '@/components/ui/button';
import { Card } from '@/components/ui/card';
import { toast } from 'sonner';

interface Option {
    id: number;
    text: string;
}

interface Question {
    id: number;
    text: string;
    options: Option[];
}

interface Process {
    id: number;
    name: string;
    questions: Question[];
}

interface ProcessGroup {
    dominio: string;
    procesos: Process[];
}

interface Framework {
    name: string;
    processGroups: ProcessGroup[];
}

interface Props {
    framework: Framework;
}

export default function CobitAllQuestions({ framework }: Props) {
    const [answers, setAnswers] = useState<Record<number, number>>({});
    const [groupIndex, setGroupIndex] = useState(0);
    const currentGroup = framework.processGroups[groupIndex];

    const handleAnswer = (questionId: number, optionId: number) => {
        setAnswers(prev => ({ ...prev, [questionId]: optionId }));
    };

    const handleCancel = () => {
        window.location.href = '/dashboard';
    };

    const handleNext = () => {
        setGroupIndex(groupIndex + 1);
    };

    const handleBack = () => {
        setGroupIndex(groupIndex - 1);
    };

    const handleSubmit = () => {
        const respuestas = Object.entries(answers).map(([questionId, optionId]) => ({
            question_id: parseInt(questionId),
            option_id: optionId,
        }));

        if (respuestas.length === 0) {
            toast.warning('No se han respondido preguntas');
            return;
        }

        router.post('/cobit/asses', {
            framework: 'COBIT',
            respuestas,
        }, {
            onSuccess: () => {
                toast.success('Evaluación completa enviada');
                setTimeout(() => {
                    router.visit('/dashboard');
                }, 1000);
            },
            onError: () => toast.error('Error al enviar evaluación'),
        });
    };

    return (
        <AppSidebarLayout breadcrumbs={[
            { title: 'COBIT', href: '/cobit' },
            { title: 'Evaluación', href: '/cobit/allQuestions' }
        ]}>
            <Head title="Evaluación COBIT" />
            <div className="p-6 space-y-8">
                <div className="text-center">
                    <h1 className="text-3xl font-bold text-[#B23A8A]">Dominio: {currentGroup.dominio}</h1>
                </div>

                <div className="space-y-6">
                    {currentGroup.procesos.map(process => (
                        <Card key={process.id} className="p-6 space-y-4 border-2 border-[#E9C7E0] shadow-sm">
                            <h2 className="text-xl font-semibold text-[#B23A8A]">{process.name}</h2>
                            {process.questions.map(question => (
                                <div key={question.id} className="space-y-2">
                                    <p className="font-medium text-gray-800 dark:text-gray-100">{question.text}</p>
                                    <div className="grid gap-2 md:grid-cols-2">
                                        {question.options.map(option => (
                                            <Button
                                                key={option.id}
                                                variant={answers[question.id] === option.id ? 'default' : 'outline'}
                                                onClick={() => handleAnswer(question.id, option.id)}
                                            >
                                                {option.text}
                                            </Button>
                                        ))}
                                    </div>
                                </div>
                            ))}
                        </Card>
                    ))}
                </div>
                <div className="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mt-8">
                    <div>
                        {groupIndex === 0 && (
                            <Button variant="destructive" onClick={handleCancel}>Cancelar evaluación</Button>
                        )}
                    </div>
                    <div className="flex gap-4 ml-auto">
                        {groupIndex > 0 && (
                            <Button variant="secondary" onClick={handleBack}>Anterior</Button>
                        )}
                        {groupIndex < framework.processGroups.length - 1 ? (
                            <Button onClick={handleNext}>Siguiente</Button>
                        ) : (
                            <Button onClick={handleSubmit}>Enviar evaluación (finalizar)</Button>
                        )}
                    </div>
                </div>
            </div>
        </AppSidebarLayout>
    );
}
