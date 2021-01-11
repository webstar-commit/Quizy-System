<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Quiz;
use App\Students_score;


class Students_scoresController extends Controller
{
    public function create(Request $request, $quiz_id, $user_id)
    {

        $quiz = Quiz::find($quiz_id);
        $user = User::find($user_id);

        $scoreCount=0;
        $totalQuestions =  count($quiz->question);
        foreach ($request->all() as $key => $ans)
        {
            if ($ans == "True"){ $scoreCount++;}
        }

        Students_score::create(
        [
          'user_id' => $user->id,
          'quiz_id' => $quiz->id,
          'score' => $scoreCount,
          'total' => $totalQuestions
        ]
        );

        return redirect('/');
    }

}
