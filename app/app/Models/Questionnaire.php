<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(QuestionnaireCategory::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function questionnaireResults() {
        return $this->hasMany(QuestionnaireResult::class);
    }
}
