<?php

namespace Qihucms\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $fillable = [
        'uri', 'block', 'sort', 'title', 'icon', 'url', 'show_title', 'show_icon', 'show_h5',
        'show_mini_app', 'show_app', 'permission'
    ];

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            'Qihucms\Role\Models\Role',
            'role_menus',
            'menu_id',
            'role_id'
        )->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $model->roles()->detach();
        });
    }
}
