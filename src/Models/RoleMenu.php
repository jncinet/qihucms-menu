<?php

namespace Qihucms\Menu\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleMenu extends Pivot
{
    protected $table = 'role_menus';

    public $incrementing = true;

    protected $fillable = ['role_id', 'menu_id'];
}
