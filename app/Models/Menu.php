<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 *
 */
class Menu extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $fillable = [
        'menu_name',
        'link',
        'icon',
        'parent_id',
        'order',
        'IsActive',
    ];
    public function submenus()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->orderBy('order');
    }
    public function parentMenu()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
