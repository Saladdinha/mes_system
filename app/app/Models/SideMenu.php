<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideMenu extends Model
{
    protected $primaryKey = "id";
    protected $table = 'side_menus';
    protected $fillable = [
        "name",
        "icon",
        "route",
        "group"
    ];
}
