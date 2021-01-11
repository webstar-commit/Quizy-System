<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Quiz;
use Mail;
use App\Mail\QuizLink;
use App\User;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz.index', compact('quizzes'));
    }


    public function show($id)
    {
        $quiz =  Quiz::find($id);
        return view('quiz.show', compact('quiz'));
    }


    public function sendToUsers($id)
    {
         $users = User::all();
         $quiz = Quiz::find($id);
        foreach ($users as $user) {
            Mail::send('emails.quizlink', ['user' => $user, 'quiz' => $quiz], function ($m) use ($user) {
                $m->from('you@domain.com', 'Friendly Name');
                $m->to($user->email, $user->name)->subject('Quiz Link');


            });

        }

    }

}
