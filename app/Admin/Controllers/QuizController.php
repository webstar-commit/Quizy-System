<?php

namespace App\Admin\Controllers;

use App\Quiz;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class QuizController extends Controller
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

            $content->header('Quiz');
            $content->description('Quizzes CRUD');

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
        return Admin::grid(Quiz::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('Quiz Title')->sortable();
            $grid->created_at();
            $grid->updated_at();
            $grid->actions( function ($actions) {
                $url = "/quiz/send/". $actions->getKey();
                $actions->append('<a href=' . $url . ' ><i class="fa fa-send">Send to Users</i></a>');

                    // prepend an action.
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Quiz::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', "Quiz Title");
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
