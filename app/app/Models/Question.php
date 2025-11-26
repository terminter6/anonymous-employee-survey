<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text',
        'questionnaire_id',
        'type',
    ];

    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
