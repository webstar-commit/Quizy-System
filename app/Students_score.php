<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students_score extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'score', 'total'];
}
