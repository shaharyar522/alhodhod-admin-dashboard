<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{


    use HasFactory;

    protected $fillable = [
        'lang',
        'article_title',
        'article_slug',
        'article_image',
        'content',
        'show_on_home_page',
        'menu_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
