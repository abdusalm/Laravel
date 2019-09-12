<?php

namespace App\Admin\Controllers;

use App\Institute;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InsControler extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Institute';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Institute);

        $grid->column('id', __('Id'));
        $grid->column('ins_name', __('学院名称'));
        $grid->column('ins_id', __('学院编码'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->filter(function ($filter){
            $filter->disableIdFilter();
        });
        $grid->quickSearch('ins_name');
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
        $show = new Show(Institute::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('ins_name', __('学院名称'));
        $show->field('ins_id', __('学院编码'));
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
        $form = new Form(new Institute);

        $form->text('ins_name', __('学院名称'));
        $ins=Institute::all()->last();
        if(!$ins){

            $ins_id=0;
            $form->hidden('ins_id', __('Ins id'))->value($ins_id+1);

        }
        else{
            $form->hidden('ins_id', __('Ins id'))->value($ins->ins_id+1);
        }

        return $form;
    }
}
