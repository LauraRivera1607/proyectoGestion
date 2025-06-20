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
            <div className="p-6 space-y-6">
                <div className="flex justify-between items-center">
                    <h1 className="text-2xl font-bold">Dominio: {currentGroup.dominio}</h1>
                    {groupIndex === 0 && (
                        <Button variant="destructive" onClick={handleCancel}>Cancelar</Button>
                    )}
                </div>

                {currentGroup.procesos.map(process => (
                    <div key={process.id} className="space-y-4">
                        <h2 className="text-xl font-semibold">{process.name}</h2>
                        {process.questions.map(question => (
                            <Card key={question.id} className="p-4 space-y-2">
                                <p className="font-medium">{question.text}</p>
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
                            </Card>
                        ))}
                    </div>
                ))}

                <div className="flex justify-between mt-6">
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
        </AppSidebarLayout>
    );
}
