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


    return (
        <AppSidebarLayout breadcrumbs={[{ title: 'CMMI', href: '/cmmi' }, { title: 'Evaluación', href: '/cmmi/evaluar' }]}>
            <Head title="Evaluación CMMI" />
            <div className="p-6 space-y-6">
                <h1 className="text-2xl font-bold">Evaluación CMMI</h1>
                <p className="text-muted-foreground">Selecciona una opción para cada pregunta:</p>

                {framework.processes.map(process => (
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

                <Button
                    className="mt-6"
                    onClick={sendAnswer}
                    disabled={loading}
                >
                    {loading ? 'Enviando...' : 'Enviar evaluación'}
                </Button>
            </div>
        </AppSidebarLayout>
    );
}
