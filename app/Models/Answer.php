<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];
    protected $appends = [
        'user_answer_id',
        'correct_answer_id'
    ];

    public function GetUserAnswerIdAttribute() {
        if(DB::table('user_questionnaires')->whereQuestionnaireId($this->questionnaire_id)->whereUserId(auth()->user()->id)->first())
        {
            return DB::table('user_questionnaires')->whereQuestionnaireId($this->questionnaire_id)->whereUserId(auth()->user()->id)->first()->answer_id;
        }
        return null;
    }

    public function GetCorrectAnswerIdAttribute() {
        if(DB::table('answers')->whereQuestionnaireId($this->questionnaire_id)->whereIsCorrect(true)->first())
        {
            return DB::table('answers')->whereQuestionnaireId($this->questionnaire_id)->whereIsCorrect(true)->first()->id;
        }
        return null;
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id', 'id');
    }
}
