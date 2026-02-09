<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'link_id',
        'country_code',
        'country_name',
        'ip_address',
        ];
}
