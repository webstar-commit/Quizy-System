<?php

use Illuminate\Routing\Router;
use App\Students_score;
Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {


    $router->get('/', 'HomeController@index');
    $router->resource('/users', UserController::class);
    $router->resource('quizzes', QuizController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('answers', AnswerController::class);


});
