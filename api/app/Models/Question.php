<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content', 'list_id'];

    public function list()
    {
        return $this->belongsTo(Lists::class);
    }

}
