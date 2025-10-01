<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    // Table ka naam set karo (kyunki default Laravel 'contacts' expect karta hai)
    protected $table = 'contact_us';
}
