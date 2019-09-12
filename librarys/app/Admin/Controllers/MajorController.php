<?php

namespace App\Admin\Controllers;

use App\Institute;
use App\Major;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MajorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Major';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Major);

        $grid->column('id', __('Id'));
        $grid->column('major_name', __('专业名称'));
        $grid->column('major_id', __('专业编码'));
        $grid->column('ins_id', __('学院编码'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->filter(function ($filter){
            $filter->disableIdFilter();
        });
        $grid->quickSearch('major_name');

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
        $show = new Show(Major::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('major_name', __('专业名称'));
        $show->field('major_id', __('专业编码'));
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
        $form = new Form(new Major);

        $form->text('major_name', __('专业编码'));
        $major_id=Major::all()->last();
        if (!$major_id){
            $major_id=0;
            $form->hidden('major_id', __('Major id'))->value($major_id+1);
        }
        else{
            $form->hidden('major_id', __('Major id'))->value($major_id->major_id+1);
        }
        $ins[]='--请选择学院--';
        $inst=Institute::get();
        foreach ($inst as $item){
            $ins[]=$item->ins_name;
        }
        $form->select('ins_id','学院名称')->options($ins);

        return $form;
    }
}
