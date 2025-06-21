import { Head, router } from '@inertiajs/react';
import { useState } from 'react';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { Button } from '@/components/ui/button';
import { Card } from '@/components/ui/card';
import { toast } from 'sonner';

type Option = {
    id: number;
    text: string;
    score: number;
};

type Question = {
    id: number;
    text: string;
    options: Option[];
};

type Process = {
    id: number;
    name: string;
    questions: Question[];
};

type Framework = {
    name: string;
    processes: Process[];
};

type Props = {
    framework: Framework;
};

export default function CmmiEvaluar({ framework }: Props) {
    const [answers, setAnswers] = useState<Record<number, number>>({});
    const [loading, setLoading] = useState(false);

    const handleAnswer = (questionId: number, optionId: number) => {
        setAnswers(prev => ({ ...prev, [questionId]: optionId }));
    };

    const sendAnswer = () => {
        const respuestas = Object.entries(answers).map(([questionId, optionId]) => ({
            question_id: parseInt(questionId),
            option_id: optionId,
        }));

        if (respuestas.length === 0) {
            toast.warning('Debes responder al menos una pregunta');
            return;
        }

        setLoading(true);
        router.post('/cmmi/asses', {
            framework: 'CMMI',
            domain: null,
            respuestas,
        }, {
            onFinish: () => setLoading(false),
            onSuccess: () => toast.success('Evaluación enviada correctamente'),
            onError: () => toast.error('Ocurrió un error al guardar las respuestas'),
        });
    };

    const handleCancel = () => {
        window.location.href = '/dashboard';
    };

    return (
        <AppSidebarLayout breadcrumbs={[
            { title: 'CMMI', href: '/cmmi' },
            { title: 'Evaluación', href: '/cmmi/evaluar' }
        ]}>
            <Head title="Evaluación CMMI" />
            <div className="p-6 space-y-8">

                <div className="text-center">
                    <h1 className="text-3xl font-bold text-[#B23A8A]">Evaluación CMMI</h1>
                    <p className="text-muted-foreground mt-2">Selecciona una opción para cada pregunta:</p>
                </div>

                <div className="space-y-6">
                    {framework.processes.map(process => (
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
                    <Button variant="destructive" onClick={handleCancel}>
                        Cancelar evaluación
                    </Button>
                    <Button
                        onClick={sendAnswer}
                        disabled={loading}
                        className="px-6 py-2"
                    >
                        {loading ? 'Enviando...' : 'Enviar evaluación'}
                    </Button>
                </div>
            </div>
        </AppSidebarLayout>
    );
}
