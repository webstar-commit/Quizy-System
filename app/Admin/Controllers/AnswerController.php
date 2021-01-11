<?php

namespace App\Admin\Controllers;

use App\Answer;

use App\Question;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AnswerController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Answer::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('question.body', 'Question');
            $grid->answer('Answer');
            $grid->is_correct('Is Correct');
            $grid->created_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Answer::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('question_id')->options(function (){
                $questions = Question::all();
                $questionsArray = [];
                foreach ($questions as $question) {

                    $questionsArray[$question->id] = $question->body;


                }
                return $questionsArray;


            });
            $form->text('answer','Answer');
            $form->radio('is_correct')->options([0 => 'False', 1=> 'True'])->default(0)->stacked();

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
