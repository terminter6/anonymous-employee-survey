<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\QuestionnaireResult;
use App\Models\Answer;

class QuestionnaireController extends Controller
{
    public function show($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        return view('questionnaire.questionnaire', compact('questionnaire'));
    }

    public function store(Request $request, $id)
    {
        $questionnaire = Questionnaire::with('questions')->findOrFail($id);

        $result = QuestionnaireResult::create([
            'questionnaire_id' => $questionnaire->id,
        ]);

        $answers = $request->input('answers', []);
        foreach ($questionnaire->questions as $question) {
            $value = $answers[$question->id] ?? null;
            if ($value === null) continue;
            $data = [
                'questionnaire_result_id' => $result->id,
                'question_id' => $question->id,
            ];
            if ($question->type === 'scale') {
                $data['scale_value'] = $value;
            } elseif ($question->type === 'text') {
                $data['text_value'] = $value;
            }
            Answer::create($data);
        }

        return redirect()->back()->with('success', 'Ваши ответы сохранены!');
    }
}
