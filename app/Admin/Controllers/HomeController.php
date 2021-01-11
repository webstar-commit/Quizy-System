<?php

namespace App\Admin\Controllers;


use App\Quiz;
use DB;
use App\Students_score;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');

            $students_score = DB::table('students_scores')
                ->select( 'quiz_id', DB::raw('count(*) as total'))
                ->groupBy('quiz_id')
                ->get();
            $quizzes = Quiz::all('title');
            $content->body(view('admin.charts.bar',[
                'quizzes' => $quizzes,
                'studentScore' => $students_score
            ]));


            $content->row(function (Row $row) {


            });

        });
    }
}
