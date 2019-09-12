<?php

namespace App\Admin\Controllers;

use App\Course;
use App\Major;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CourseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Course';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Course);

        $grid->column('id', __('Id'));
        $grid->column('co_name', __('课程名称'));
        $grid->column('co_id', __('课程编码'));
        $grid->column('major_id', __('所属专业编码'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->filter(function ($filter){
            $filter->disableIdFilter();
        });
        $grid->quickSearch('co_name');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Course::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('co_name', __('课程名称'));
        $show->field('co_id', __('课程编码'));
        $show->field('major_id', __('专业编码'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Course);
        $a[]='--请选择专业--';
        $major_id=Major::get();
        foreach ($major_id as $item) {
            $a[]=$item->major_name;
        }
        $major=$a;
       /* print_r($major);*/
        $form->text('co_name', __('课程名称'));
        $form->select('major_id','专业名称')->options($major);
        $co_id=Course::all()->last();
        if(!$co_id){
            $co_id=0;
            $form->hidden('co_id', __('Co id'))->value($co_id+1);
        }
        else{
            $form->hidden('co_id', __('Co id'))->value($co_id->co_id+1);
        }
        return $form;

    }
}
