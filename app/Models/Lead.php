<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    // Only created_at exists, no updated_at
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'gclid', 'sub_id', 'created_at'
    ];
}
