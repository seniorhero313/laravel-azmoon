<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
