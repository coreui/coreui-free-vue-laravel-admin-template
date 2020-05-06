<?php

namespace App\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Roles extends EloquentRole
{
	public function menu() {
        return $this->hasMany('App\Models\Menus');
    }
}
