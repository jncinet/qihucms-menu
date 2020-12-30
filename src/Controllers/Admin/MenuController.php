<?php

namespace Qihucms\Menu\Controllers\Admin;

use App\Admin\Controllers\Controller;
use Qihucms\Menu\Models\Menu as MenuModel;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Qihucms\Role\Models\Permission;
use Qihucms\Role\Models\Role;

class MenuController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '前端菜单管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MenuModel());

        $grid->model()->orderBy('uri', 'desc')
            ->orderBy('block', 'desc')
            ->orderBy('sort', 'desc')
            ->orderBy('id');

        $grid->filter(function ($filter) {
            $filter->equal('uri', __('menu::menu.uri'));
            $filter->equal('block', __('menu::menu.block'));
            $filter->like('title', __('menu::menu.title'));
            $filter->equal('show_title', __('menu::menu.show_title'))->select(__('menu::menu.is_val'));
            $filter->equal('show_icon', __('menu::menu.show_icon'))->select(__('menu::menu.is_val'));
            $filter->equal('show_h5', __('menu::menu.show_h5'))->select(__('menu::menu.is_val'));
            $filter->equal('show_mini_app', __('menu::menu.show_mini_app'))->select(__('menu::menu.is_val'));
            $filter->equal('show_app', __('menu::menu.show_app'))->select(__('menu::menu.is_val'));
        });

        $grid->column('icon', __('menu::menu.icon'))
            ->image('', 66);
        $grid->column('id', __('menu::menu.id'));
        $grid->column('title', __('menu::menu.title'));
        $grid->column('uri', __('menu::menu.uri'));
        $grid->column('block', __('menu::menu.block'));
        $grid->column('sort', __('menu::menu.sort'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));

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
        $show = new Show(MenuModel::findOrFail($id));

        $show->field('id', __('menu::menu.id'));
        $show->field('uri', __('menu::menu.uri'));
        $show->field('block', __('menu::menu.block'));
        $show->field('sort', __('menu::menu.sort'));
        $show->field('title', __('menu::menu.title'));
        $show->field('url', __('menu::menu.url'));
        $show->field('icon', __('menu::menu.unit.icon'))
            ->image();
        $show->field('show_title', __('menu::menu.show_title'))
            ->using(__('menu::menu.is_val'));
        $show->field('show_icon', __('menu::menu.show_icon'))
            ->using(__('menu::menu.is_val'));
        $show->field('show_h5', __('menu::menu.show_h5'))
            ->using(__('menu::menu.is_val'));
        $show->field('show_mini_app', __('menu::menu.show_mini_app'))
            ->using(__('menu::menu.is_val'));
        $show->field('show_app', __('menu::menu.show_app'))
            ->using(__('menu::menu.is_val'));
        $show->field('permission', __('menu::menu.permission'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MenuModel());

        $form->text('uri', __('menu::menu.uri'))
            ->help(__('menu::menu.uri_help'))->required();
        $form->text('block', __('menu::menu.block'))
            ->help(__('menu::menu.block_help'));
        $form->text('title', __('menu::menu.title'));
        $form->image('icon', __('menu::menu.icon'))
            ->uniqueName()->removable()->move('menu');
        $form->text('url', __('menu::menu.url'))
            ->help(__('menu::menu.url_help'));
        $form->radio('show_title', __('menu::menu.show_title'))
            ->options(__('menu::menu.is_val'));
        $form->radio('show_icon', __('menu::menu.show_icon'))
            ->options(__('menu::menu.is_val'));
        $form->radio('show_h5', __('menu::menu.show_h5'))
            ->options(__('menu::menu.is_val'));
        $form->radio('show_mini_app', __('menu::menu.show_mini_app'))
            ->options(__('menu::menu.is_val'));
        $form->radio('show_app', __('menu::menu.show_app'))
            ->options(__('menu::menu.is_val'));
        $form->multipleSelect('roles', trans('admin.roles'))
            ->options(Role::all()->pluck('name', 'id'));
        $form->select('permission', __('menu::menu.permission'))
            ->options(Permission::all()->pluck('name', 'slug'));
        $form->number('sort', __('menu::menu.sort'))
            ->default(0);
        $form->display('created_at', __('admin.created_at'));
        $form->display('updated_at', __('admin.updated_at'));

        return $form;
    }
}
