<?php

use Illuminate\Database\Seeder;
use App\Models\Menus;

class MenuSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$admin = Sentinel::getRoleRepository()->findBySlug('administrator');
    	$moderator = Sentinel::getRoleRepository()->findBySlug('moderator');
    	$normal = Sentinel::getRoleRepository()->findBySlug('normal');


      $m = new Menus;
    	$m->roles_id = $admin->id;
    	$m->name = 'Dashboard';
    	$m->href = '/';
    	$m->icon = 'cil-speedometer';
    	$m->slug = 'link';
    	$m->menu_id = 1;
      $m->save();

      $m = new Menus;
    	$m->roles_id = $admin->id;
    	$m->name = 'Theme';
    	$m->href = '';
    	$m->icon = '';
    	$m->slug = 'title';
    	$m->menu_id = 1;
      $m->save();

      $m = new Menus;
    	$m->roles_id = $admin->id;
    	$m->name = 'Colors';
    	$m->href = '/colors';
    	$m->icon = 'cil-drop';
    	$m->slug = 'link';
    	$m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Typography';
      $m->href = '/typography';
      $m->icon = 'cil-pencil';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Components';
      $m->href = '';
      $m->icon = '';
      $m->slug = 'title';
      $m->menu_id = 1;
      $m->save();

      $md = new Menus;
      $md->roles_id = $admin->id;
      $md->name = 'Base';
      $md->href = '/base';
      $md->icon = 'cil-puzzle';
      $md->slug = 'dropdown';
      $md->menu_id = 1;
      $md->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Breadcrumb';
      $m->href = '/base/breadcrumb';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Cards';
      $m->href = '/base/cards';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Carousel';
      $m->href = '/base/carousel';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Collapse';
      $m->href = '/base/collapse';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Forms';
      $m->href = '/base/forms';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Jumbotron';
      $m->href = '/base/jumbotron';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'List group';
      $m->href = '/base/list-group';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Navs';
      $m->href = '/base/navs';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Pagination';
      $m->href = '/base/pagination';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Popovers';
      $m->href = '/base/popovers';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Progress';
      $m->href = '/base/progress';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Scrollspy';
      $m->href = '/base/scrollspy';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Switches';
      $m->href = '/base/switches';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Tables';
      $m->href = '/base/tables';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Tabs';
      $m->href = '/base/tabs';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Tooltips';
      $m->href = '/base/tooltips';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $md = new Menus;
      $md->roles_id = $admin->id;
      $md->name = 'Buttons';
      $md->href = '/buttons';
      $md->icon = 'cil-cursor';
      $md->slug = 'dropdown';
      $md->menu_id = 1;
      $md->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Buttons';
      $m->href = '/buttons/buttons';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Buttons Group';
      $m->href = '/buttons/button-group';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Dropdowns';
      $m->href = '/buttons/dropdowns';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Brand Buttons';
      $m->href = '/buttons/brand-buttons';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Charts';
      $m->href = '/charts';
      $m->icon = 'cil-chart-pie';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $md = new Menus;
      $md->roles_id = $admin->id;
      $md->name = 'Icons';
      $md->href = '/icon';
      $md->icon = 'cil-star';
      $md->slug = 'dropdown';
      $md->menu_id = 1;
      $md->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'CoreUI Icons';
      $m->href = '/icon/coreui-icons';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Flags';
      $m->href = '/icon/flags';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Brands';
      $m->href = '/icon/brands';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $md = new Menus;
      $md->roles_id = $admin->id;
      $md->name = 'Notifications';
      $md->href = '/notifications';
      $md->icon = 'cil-bell';
      $md->slug = 'dropdown';
      $md->menu_id = 1;
      $md->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Alerts';
      $m->href = '/notifications/alerts';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Badge';
      $m->href = '/notifications/badge';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Modals';
      $m->href = '/notifications/badge';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Widgets';
      $m->href = '/widgets';
      $m->icon = 'cil-calculator';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Extra';
      $m->slug = 'title';
      $m->menu_id = 1;
      $m->save();

      $md = new Menus;
      $md->roles_id = $admin->id;
      $md->name = 'Pages';
      $md->href = '/pages';
      $md->icon = 'cil-star';
      $md->slug = 'dropdown';
      $md->menu_id = 1;
      $md->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Login';
      $m->href = '/login';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Register';
      $m->href = '/register';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Error 404';
      $m->href = '/404';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->parent_id = $md->id;
      $m->name = 'Error 500';
      $m->href = '/500';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Download CoreUI';
      $m->href = 'https://coreui.io';
      $m->icon = 'cil-cloud-download';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Try CoreUI PRO';
      $m->href = 'https://coreui.io/pro/';
      $m->icon = 'cil-layers';
      $m->slug = 'link';
      $m->menu_id = 1;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Account';
      $m->slug = 'dropdown';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Update';
      $m->href = '/update';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Messages';
      $m->href = '/messages';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Tasks';
      $m->href = '/tasks';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Comments';
      $m->href = '/comments';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Settings';
      $m->slug = 'dropdown';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Profile';
      $m->href = '/profile';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Settings';
      $m->href = '/settings';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Payments';
      $m->href = '/payments';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();

      $m = new Menus;
      $m->roles_id = $admin->id;
      $m->name = 'Projects';
      $m->href = '/projects';
      // $m->icon = 'cil-circle';
      $m->slug = 'link';
      $m->menu_id = 2;
      $m->save();
    }
}
