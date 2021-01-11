<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Question
 *
 * @mixin \Eloquent
 */
class Question extends Model
{
    protected $fillable= ['quiz_id', 'body'];



    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

}
