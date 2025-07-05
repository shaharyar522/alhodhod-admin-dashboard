<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
    



    public function menu(){

    return $this->hasMany(Page::class);
    
    }
    
}
