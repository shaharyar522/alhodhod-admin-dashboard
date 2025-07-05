<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{


    protected $guarded = [];
    
    public function page(){
        return $this->belongsTo(Page::class);
    }
    
    public function article(){
        return $this->hasMany(Article::class);
    }
}
