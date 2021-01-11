<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Answer
 *
 * @mixin \Eloquent
 */
class Answer extends Model
{
    protected $fillable = [];


    public function question()
    {
        return $this->belongsTo(Question::class);
    }


    public function getIsCorrectAttribute($value)
    {
        if($value == 0)
        {
            $toString = "False";

            return $toString;
        }else
        {
            $toString = "True";

            return $toString;
        }

    }

}
