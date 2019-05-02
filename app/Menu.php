<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nama', 'parent_id', 'link'];

    protected $table = 'menu';

    public function childs() {
        return $this->hasMany('App\Menu','parent_id','id') ;
    }
}
