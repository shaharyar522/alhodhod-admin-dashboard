<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $guarded = [];

    // Laravel by default "contact_us" expect karega (singular/plural issue avoid karne ke liye explicitly set kar do)
    protected $table = 'contact_us';
}
