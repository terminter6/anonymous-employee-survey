<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'questionnaire_result_id',
        'question_id',
        'scale_value',
        'text_value',
    ];

    public function questionnaireResult() {
        return $this->belongsTo(QuestionnaireResult::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
