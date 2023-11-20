<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['subject', 'question_text', 'response_field'];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function lists()
    {
        return $this->belongsToMany(QuestionList::class, 'question_list_question');
    }

}
