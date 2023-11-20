<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    protected $fillable = ['subject', 'name', 'is_public'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_list_question');
    }
}
