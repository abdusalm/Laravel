<?php

namespace App\Admin\Controllers;

use App\UserInfo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserControlle extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\UserInfo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserInfo);

        $grid->column('id', __('Id'));
        $grid->column('username', __('用户名'));
        $grid->column('password', __('密码'))->hide();
        $grid->column('user_id', __('用户账号'));
        $grid->column('role', __('角色'));
        $grid->column('motto', __('座右铭'));
        $grid->column('resume', __('简历'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(UserInfo::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('用户名'));
        $show->field('password', __('密码'));
        $show->field('user_id', __('用户账号'));
        $show->field('role', __('角色'));
        $show->field('motto', __('座右铭'));
        $show->field('resume', __('简历'));
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
        $form = new Form(new UserInfo);

        $form->text('username', __('用户名'));
        $form->password('password', __('密码'));
        $form->saving(function (Form $form){
            if ($form->password&&$form->model()->password!=$form->password){
                $form->password=encrypt($form->password);
            }
        });
        $user=UserInfo::query()->where('role','teacher')->count();
        $count=$user+1;
        $form->hidden('user_id')->value('t1000'.$count);
        $form->select('role','角色')->options(['--请选择角色--','teacher'=>'教师','student'=>'学生']);
        $form->text('motto', __('座右铭'));
        $form->text('resume', __('简历'));

        return $form;
    }
}
